<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTeam extends Model
{
    use HasFactory;

    protected $table = 'tb_type_teams';
    protected $fillable = [
        'nama',
        'teams_id',
        'users_id'
    ];
}
