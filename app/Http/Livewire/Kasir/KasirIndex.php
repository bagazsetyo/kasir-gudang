<?php

namespace App\Http\Livewire\Kasir;

use App\Models\CheckoutKasir;
use App\Models\DetailKasir;
use App\Models\Kasir;
use Livewire\Component;

class KasirIndex extends Component
{
    public $search, $qty = 1, $price;

    public function render()
    {
        $data = DetailKasir::team();

        $kasir = $data->with('kasir','checkoutKasir')->get();

        $items = Kasir::team()
                    ->where('nama','like', '%' . $this->search . '%')
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
        $data = CheckoutKasir::create([
            'kasir_id' => $id,
            'qty' => $this->qty,
            'price' => str_replace('.','',$price)
        ]);

        DetailKasir::create([
            'teams_id' => auth()->user()->currentTeam->id,
            'users_id' => auth()->user()->id,
            'kasir_id' => $id,
            'checkout_kasir_id' => $data->id,
        ]);
    }
}
