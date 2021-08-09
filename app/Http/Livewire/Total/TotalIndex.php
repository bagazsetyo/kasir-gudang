<?php

namespace App\Http\Livewire\Total;

use App\Models\DetailKasir;
use Livewire\Component;

class TotalIndex extends Component
{
    public $kasir, $pembayaran, $nominal = 0, $total = 0;
    protected $listeners = [
        'updateTotal' => 'updateTotal',
        'updateTotals' => 'updateTotal',
        'checkout' => 'resetFilters'
    ];

    public function updateTotal($kasir)
    {
        $kasir = DetailKasir::team()->with('checkoutKasir')->get();
        $this->kasir = $kasir;   
    }
    public function resetFilters()
    {
        $this->reset(['pembayaran','nominal','total']);
    }
    public function mount($kasir)
    {
        $this->kasir = $kasir;
    }

    public function render()
    {
        $total = [];
        foreach ($this->kasir as $key) {
            $total[] = $key->checkoutKasir->qty * $key->checkoutKasir->price;
        }
        $total = array_sum($total);
        $this->total = $total;
        $data = [
            'total' => $total,
            'bayar' => $this->nominal
        ];
        $this->emit('totalBayar', $data);
        return view('livewire.total.total-index');
    }
}
