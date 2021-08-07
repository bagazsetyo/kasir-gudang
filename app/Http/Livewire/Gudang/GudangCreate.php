<?php

namespace App\Http\Livewire\Gudang;

use App\Models\Gudang;
use Livewire\Component;

class GudangCreate extends Component
{
    public $nama, $qty, $price;

    public function render()
    {
        return view('livewire.gudang.gudang-create');
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'qty' => 'required|integer',
            'price' => 'required|integer',
        ]);
        $data = Gudang::query();
        $gudang = $data->create([
            'nama' => $this->nama,
            'qty' => $this->qty,
            'price' => $this->price,
            'teams_id' => auth()->user()->currentTeam->id,
            'users_id' => auth()->user()->id
        ]);

        $this->resetInput();

        $this->emit('gudangStore', $gudang);
    }
    public function resetInput(){
        $this->nama = null;
        $this->qty = null;
        $this->price = null;
    }
}
