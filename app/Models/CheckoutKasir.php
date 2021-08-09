<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutKasir extends Model
{
    use HasFactory;

    protected $table = 'checkout_kasir';

    protected $fillable = [
        'kasir_id',
        'qty',
        'price',
    ];
    
    protected $hidden = [
        'kasir_id',
    ];
    
}
