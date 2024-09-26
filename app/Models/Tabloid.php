<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Tabloid extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'tabloids';
    protected $fillable = [
        'title',
        'description',
        'file',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'description', 'file']) // atribut yang ingin dicatat
            ->setDescriptionForEvent(fn(string $eventName) => "Tabloid has been {$eventName}");
    }
}
