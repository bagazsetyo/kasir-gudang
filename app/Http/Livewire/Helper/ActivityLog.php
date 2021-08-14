<?php

namespace App\Http\Livewire\Helper;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Activitylog\Models\Activity;

class ActivityLog extends Component
{
    use WithPagination;
    public function render()
    {

        $items = Activity::paginate(12);
        return view('livewire.helper.activity-log')->with([
            'items' => $items
        ]);
    }
}
