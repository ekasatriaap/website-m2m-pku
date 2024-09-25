<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Slider extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'sliders';
    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'description', 'image']) // atribut yang ingin dicatat
            ->setDescriptionForEvent(fn(string $eventName) => "Gallery has been {$eventName}");
    }
}
