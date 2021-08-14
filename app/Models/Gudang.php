<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Gudang extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'gudang';

    protected $fillable = [
        'users_id',
        'teams_id',
        'nama',
        'price',
        'qty'
    ];

    protected static $logAttributes = [
        'users_id',
        'teams_id',
        'nama',
        'price',
        'qty'
    ];

    // protected static $recordEvents = ['deleted','created','updated'];
    protected static $logOnlyDirty = false;
    protected static $logName = 'Gudang';

    public function getDescriptionForEvent(string $eventName)
    {
        return "{$eventName}";
    }

    protected static function eventsToBeRecorded() 
    { 
        if (isset(static::$recordEvents)) { 
            return collect(static::$recordEvents); 
        } 
     
        $events = collect([ 
            'created', 
            'updated', 
            'deleted', 
        ]); 
     
        if (collect(class_uses_recursive(static::class))->contains(SoftDeletes::class)) { 
            $events->push('restored'); 
        } 
     
        return $events; 
    } 
}
