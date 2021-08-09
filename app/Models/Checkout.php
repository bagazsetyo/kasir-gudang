<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $table = 'checkout';

    protected $fillable = [
        'desc',
        'data',
        'nama_user',
        'teams_id',
        'users_id',
        'uuid'
    ];

    
    public function scopeTeam()
    {
        return $this->where('teams_id', auth()->user()->currentTeam->id);
    }

    public function getDataAttribute($value)
    {
        return json_decode($value);
    }
}
