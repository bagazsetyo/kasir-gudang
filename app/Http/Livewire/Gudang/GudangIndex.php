<?php

namespace App\Http\Livewire\Gudang;

use App\Models\Gudang;
use Livewire\Component;
use Livewire\WithPagination;

class GudangIndex extends Component
{
    use WithPagination;

    public $search;
    public $edit = false;
    public $create = false;

    protected $listeners = [
        'gudangStore' => 'gudangStore',
        'updateGudang' => 'updateGudang'
    ];

    public function gudangStore()
    {
        
    }
    public function updateGudang()
    {
        $this->edit = false;
    }

    public function render()
    {
        $items = Gudang::select('nama', \DB::raw('count(nama) as total, sum(qty) as qty, sum(price) as price'))
                        ->groupBy('nama')
                        ->where('teams_id',auth()->user()->currentTeam->id)
                        ->paginate(10);
        if($this->search){
            $items = Gudang::select('nama', \DB::raw('count(nama) as total, sum(qty) as qty, sum(price) as price'))
            ->groupBy('nama')
            ->where('teams_id',auth()->user()->currentTeam->id)
            ->where('nama','like', '%' . $this->search . '%')
            ->orWhere('qty','like', '%' . $this->search . '%')
            ->orWhere('price','like', '%' . $this->search  . '%')
            ->paginate(10);
        }
        return view('livewire.gudang.gudang-index')->with([
            'items' => $items
        ]);
    }
    public function setAction($action)
    {
        if($action == 'crate'){
            $this->create = true;
            $this->edit = false;
        }else{
            $this->create = false;
            $this->edit = false;
        }
    }
    public function destroy($id)
    {
        Gudang::where('nama',$id)->delete();
    }
    public function edit($id)
    {
        $gudang = Gudang::where('nama',$id)->first();
        $this->edit = true;
        $this->create = false;
        $this->emit('editData', $gudang);
    }
}
