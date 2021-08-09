<?php

namespace App\Http\Livewire\Kasir;

use App\Models\Checkout;
use App\Models\CheckoutKasir;
use App\Models\DetailKasir;
use App\Models\Kasir;
use App\Models\User;
use Livewire\Component;

class KasirIndex extends Component
{
    public $search, $qty = 1, $price;
    private $total, $bayar;

    protected $listeners = [
        'totalBayar' => 'totalBayar',
    ];
    
    public function totalBayar($data)
    {
        $this->total = $data['total'];
        $this->bayar = $data['bayar'];
    }

    public function render()
    {
        $kasir = DetailKasir::team()->with('kasir.teams','checkoutKasir')->get();

        $items = Kasir::team()
                    ->where('nama','like', '%' . $this->search . '%')
                    ->orWhere('uuid','like', '%' . $this->search . '%')
                    ->orWhere('qty','like', '%' . $this->search . '%')
                    ->orWhere('price','like', '%' . $this->search . '%')
                    ->take(3)
                    ->get();

        $this->emit('updateTotal', $kasir);

        return view('livewire.kasir.kasir-index')->with([
            'items' => $items,
            'kasir' => $kasir
        ]);
    }

    public function create($id, $price)
    {
        $i = auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'create');
        if(!$i){
            dd(1);
        }
        $data = Kasir::team()->first();
        if ($data->qty) {
            $kasir = CheckoutKasir::create([
                'kasir_id' => $id,
                'qty' => $this->qty,
                'price' => str_replace('.','',$price)
            ]);

            DetailKasir::create([
                'teams_id' => auth()->user()->currentTeam->id,
                'users_id' => auth()->user()->id,
                'kasir_id' => $id,
                'checkout_kasir_id' => $kasir->id,
            ]);
            $this->qtyKasir(-1);
            
            $this->emit('updateTotal', $kasir);
        }
    }
    public function increment($id)
    {
        $data = CheckoutKasir::find($id);
        $kasir = Kasir::team()->first();
        if ($kasir->qty != 0) {
            $data->increment('qty',1);
            $this->qtyKasir(-1);
        }
    }
    public function decrement($id)
    {
        $kasir = CheckoutKasir::find($id);
        if ($kasir->qty) {
            $kasir->decrement('qty',1);
            $this->qtyKasir(1);
        }
    }
    public function hapus($id)
    {
        CheckoutKasir::find($id)->delete();
    }
    public function bayar()
    {
        $data = DetailKasir::team()->with('kasir','checkoutKasir')->get();
        $total = [
            'total' => $this->total,
            'bayar' => $this->bayar
        ];
        $checkout = [
            'user' => auth()->user(),
            'data' => $data,
            'total' => $total
        ];

        $items = Checkout::create([
            'data' => json_encode($checkout),
            'users_id' => auth()->user()->id,
            'nama_user' => auth()->user()->name,
            'teams_id' => auth()->user()->currentTeam->id, 
            'uuid' => str_pad(mt_rand(1,999999),6,"0",STR_PAD_LEFT)
        ]);
        DetailKasir::team()->delete();
        
        $this->emit('checkout',$items);
    }
    public function clear()
    {
        DetailKasir::team()->delete();
    }

    public function qtyKasir($qty)
    {
        Kasir::team()->first()->increment('qty',$qty);
    }
}
