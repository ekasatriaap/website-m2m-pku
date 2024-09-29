<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Pages extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'pages';
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'slug', 'content', 'image']) // atribut yang ingin dicatat
            ->setDescriptionForEvent(fn(string $eventName) => "Pages has been {$eventName}");
    }
}
