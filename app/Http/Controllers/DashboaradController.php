<?php

namespace App\Http\Controllers;

use App\Models\TypeTeam;
use Illuminate\Http\Request;


class DashboaradController extends Controller
{
    public function index()
    {
        $type = TypeTeam::where('teams_id',auth()->user()->CurrentTeam->id)->select('nama')->first();
        return view('dashboard')->with([
            'type' => $type
        ]);
    }
}
