<?php

namespace App\Http\Livewire\Gudang;

use App\Models\Gudang;
use App\Models\Kasir;
use App\Models\Team;
use App\Models\TypeTeam;
use Livewire\Component;

class GudangEdit extends Component
{
    public $idGudang, $nama, $qty, $price, $ambil, $team, $keys = 1, $sum = 0;

    protected $listeners = [
        'editData' => 'edit'
    ];

    public function edit($gudang)
    {
        $this->idGudang = null;
        $this->team = null;
        $this->nama = $gudang['nama'];
    }

    public function render()
    {
        
        if($this->idGudang and $this->keys != 0){
            $gudang = Gudang::findOrFail($this->idGudang);
            $this->nama = $gudang->nama;
            $this->qty = $gudang->qty;
            $this->price = $gudang->price;
            
            $this->keys = 0;
        }elseif($this->team){
            $gudang = Gudang::findOrFail($this->idGudang);
            $this->nama = $gudang->nama;
        }
        
        if($this->team == 'batal'){
            $this->ambil = 0;
            $this->team = null;
        }
        
        $teams = [];
        $dataTeam = TypeTeam::select('teams_id')->where('nama','Kasir')->get()->toArray();
        $teams = Team::whereIn('id',$dataTeam)->select('name','id')->get();

        $data = Gudang::where('nama', $this->nama);
        $this->sum = $data->sum('qty');
        $items = $data->get();
        return view('livewire.gudang.gudang-edit')->with([
            'items' => $items,
            'teams' => $teams,
        ]);
    }

    public function store()
    {
        $gudang = Gudang::find($this->idGudang);
        if ($this->team) { 
            $this->validate([
                'nama' => 'required',
                'qty' => 'required|min:0|integer|max:' . $gudang->qty,
                'price' => 'required|integer'
            ]);
        }else{
            $this->validate([
                'nama' => 'required',
                'qty' => 'required|min:0|integer',
                'price' => 'required|integer'
            ]);
        }
        if($this->team){
            Kasir::create([
                'uuid' => uniqid(),
                'nama' => $this->nama,
                'qty' => $this->qty,
                'price' => $this->price,
                'teams_id' => $this->team,
                'users_id' => auth()->user()->id
            ]);
        }
        $gudang->update([
            'nama' => $this->nama,
            'qty' => $this->team ? $gudang->qty + (-1 * $this->qty) : $this->qty,
            'price' => $this->price,
            'teams_id' => auth()->user()->currentTeam->id,
            'users_id' => auth()->user()->id
        ]);
        
        
        $this->resetInput();
        $this->emit('updateGudang', $gudang);
    }

    
    public function resetInput(){
        $this->idGudang = null;
        $this->nama = null;
        $this->keys = 1;
        $this->qty = null;
        $this->price = null;
        $this->ambil = null;
        $this->team = null;
    }
}
