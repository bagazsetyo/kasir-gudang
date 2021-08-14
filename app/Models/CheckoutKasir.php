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
    
    protected static $logAttributes = [
        'users_id',
        'teams_id',
        'nama',
        'price',
        'qty'
    ];

    // protected static $recordEvents = ['deleted'];
    protected static $logOnlyDirty = false;
    protected static $logName = 'Detail Kasir';

    public function getDescriptionForEvent(string $eventName)
    {
        return "{$eventName}";
    }
    
}
