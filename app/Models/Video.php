<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Video extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'videos';
    protected $fillable = [
        'title',
        'url',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'url']) // atribut yang ingin dicatat
            ->setDescriptionForEvent(fn(string $eventName) => "Video has been {$eventName}");
    }
}
