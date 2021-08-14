<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class Permission
{
    use HandlesAuthorization;

    public static function user()
    {
        $user = auth()->user(); 
        $team = auth()->user()->currentTeam;
        return $data = [
            'user' => $user,
            'team' => $team
        ];
    }
    public static function create()
    {   
        $data = self::user();
        return $data['team']->userHasPermission($data['user'], 'create');
    }
    public static function edit()
    {   
        $data = self::user();
        return $data['team']->userHasPermission($data['user'], 'update');
    }
    public static function delete()
    {   
        $data = self::user();
        return $data['team']->userHasPermission($data['user'], 'delete');
    }
    public static function Administrator()
    {   
        $data = self::user();
        return $data['user']->hasTeamRole($data['team'], 'admin');
    }
}
