<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    use HasFactory;

    protected $table = 'kasir';

    protected $fillable = [
        'users_id',
        'teams_id',
        'nama',
        'price',
        'qty',
        'uuid'
    ];
    
    protected $hidden = [
        'users_id',
        'teams_id'
    ];

    
    public function teams()
    {
        return $this->belongsTo(Team::class, 'teams_id','id');
    }

    public function scopeTeam()
    {
        return $this->where('teams_id', auth()->user()->currentTeam->id);
    }
}
