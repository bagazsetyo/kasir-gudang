<?php

namespace App\Http\Livewire\Kasir;

use App\Helpers\Permission;
use App\Models\Checkout;
use App\Models\CheckoutKasir;
use App\Models\DetailKasir;
use App\Models\Kasir;
use App\Models\User;
use Livewire\Component;

class KasirIndex extends Component
{
    public $search, $qty = 1, $price;
    public $total = 0, $bayar = 0;

    protected $listeners = [
        'totalBayar' => 'totalBayar',
    ];
    
    public function totalBayar($data)
    {
        $this->total = $data['total'];
        $this->bayar = $data['bayar'];
    }

    public static function desc_permission(){
        $user = auth()->user();
        $team = auth()->user()->currentTeam;
        return $user->teamRole($team)->description;
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

        return view('livewire.kasir.kasir-index')->with([
            'items' => $items,
            'kasir' => $kasir
        ]);
    }

    public function create($id, $price)
    {
        $permission = Permission::create();
        if(!$permission){
            session()->flash('message', self::desc_permission());
            return false;
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
        }
    }
    public function increment($id)
    {
        $permission = Permission::create();
        if(!$permission){
            session()->flash('message', self::desc_permission());
            return false;
        }
        $data = CheckoutKasir::find($id);
        $kasir = Kasir::team()->first();
        if ($kasir->qty != 0) {
            $data->increment('qty',1);
            $this->qtyKasir(-1);
        }
        
    }
    public function decrement($id)
    {
        $permission = Permission::create();
        if(!$permission){
            session()->flash('message', self::desc_permission());
            return false;
        }
        $kasir = CheckoutKasir::find($id);
        if ($kasir->qty) {
            $kasir->decrement('qty',1);
            $this->qtyKasir(1);
        }
    }
    public function hapus($id)
    {
        $permission = Permission::delete();
        if(!$permission){
            session()->flash('message', self::desc_permission());
            return false;
        }
        $data = CheckoutKasir::find($id);
        
        $kasir = Kasir::find($data->kasir_id);
        $kasir->increment('qty', $data->qty);
        
        $data->delete();
        $this->emit('updateTotal', $kasir);
        
    }
    public function bayar()
    {
        $permission = Permission::create();
        if(!$permission){
            session()->flash('message', self::desc_permission());
            return false;
        }
        $details = DetailKasir::team()->with('checkoutKasir','kasir')->get();
        foreach ($details as $value) {
            $data[] = ([
                'qty' => $value->checkoutKasir->qty,
                'price' => $value->checkoutKasir->price,
                'name' => $value->kasir->nama
            ]);
        }
        $total = [
            'total' => $this->total,
            'bayar' => $this->bayar
        ];
        $checkout[] = [
            'data' => $data,
            'total' => $total
        ];

        $items = Checkout::create([
            'desc' => $details,
            'data' => json_encode($checkout),
        ]);
        DetailKasir::team()->delete();
        
        $this->emit('checkout',$items);
    }
    public function clear()
    {
        $permission = Permission::delete();
        if(!$permission){
            session()->flash('message', self::desc_permission());
            return false;
        }
        $kasir = DetailKasir::team()->delete();        
    }

    public function qtyKasir($qty)
    {
        $kasir = Kasir::team()->first()->increment('qty',$qty);
        $this->emit('updateTotal', $kasir);
    }
}
