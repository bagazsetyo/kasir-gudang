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
    
    public function kasir()
    {
        return $this->belongsTo(Team::class, 'teams_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function getDataAttribute($value)
    {
        return json_decode($value);
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->uuid =  str_pad(mt_rand(1,999999),6,"0",STR_PAD_LEFT);
            $model->users_id = auth()->user()->id;
            $model->nama_user = auth()->user()->name;
            $model->teams_id = auth()->user()->currentTeam->id;
        });
    }
}
