<?php

namespace App\Http\Controllers;

use App\Helpers\Permission;
use App\Models\Checkout;
use App\Models\CheckoutKasir;
use App\Models\DetailKasir;
use App\Models\Team;
use Exception;
use Illuminate\Http\Request;

class DetailReportController extends Controller
{
    public function __construct()
    {
    }
    public function reportKasir($id)
    {
        try{
            Permission::Administrator();
            $items = Checkout::with('user','kasir')->where('uuid',$id)->where('teams_id',auth()->user()->currentTeam->id)->first();
            
            return view('report-kasir')->with([
                'items' => $items
            ]);
        }catch(Exception $e){
            return abort(403);
        }
    }
    public function reportGudang($id)
    {
        try{
            if(!Permission::Administrator()){
                return abort(403);
            };
            $items = Checkout::with('user','kasir')->where('uuid',$id)->where('teams_id',auth()->user()->currentTeam->id)->first();
            return view('report-gudang')->with([
                'items' => $items
            ]);
        }catch(Exception $e){
            return abort(403);
        }
    }
}
