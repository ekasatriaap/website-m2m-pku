<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class SettingBerandaWeb extends Model
{
    use HasFactory, LogsActivity;

    protected $table = "setting_beranda_webs";
    protected $fillable = [
        "param",
        "value",
        "description"
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->setDescriptionForEvent(fn(string $eventName) => "Setting Beranda Web has been {$eventName}");
    }
}
