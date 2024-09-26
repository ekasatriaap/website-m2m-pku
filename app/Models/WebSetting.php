<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class WebSetting extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'web_settings';
    protected $fillable = [
        'param',
        'value',
        'description',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'description', 'image']) // atribut yang ingin dicatat
            ->setDescriptionForEvent(fn(string $eventName) => "Web setting has been {$eventName}");
    }
}
