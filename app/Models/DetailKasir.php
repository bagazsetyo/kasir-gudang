<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKasir extends Model
{
    use HasFactory;
    
    protected $table = 'detail_kasir';

    protected $fillable = [
        'teams_id',
        'users_id',
        'kasir_id',
        'checkout_kasir_id',
    ];

    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'kasir_id','id');
    }

    public function checkoutKasir()
    {
        return $this->belongsTo(CheckoutKasir::class, 'checkout_kasir_id','id');
    }

    public function scopeTeam()
    {
        return $this->where('teams_id', auth()->user()->currentTeam->id);
    }
}
