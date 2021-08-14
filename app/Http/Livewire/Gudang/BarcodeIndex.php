<?php

namespace App\Http\Livewire\Gudang;

use App\Models\Checkout;
use Livewire\Component;
use Livewire\WithPagination;

class BarcodeIndex extends Component
{   
    use WithPagination;
    
    protected $listeners = [
        'checkout' => 'checkout',
    ];

    public function checkout()
    {
        # code...
    }
    public function render()
    {
        $items = Checkout::team()->select('uuid')->orderBy('id','desc')->paginate(20);
        return view('livewire.gudang.barcode-index')->with([
            'items' => $items
        ]);
    }
}
