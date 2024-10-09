<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class SyaratPPDB extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'syarat_ppdb';
    protected $primaryKey = 'id';
    protected $fillable = ['syarat_name', 'description', 'urutan'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['syarat_name', 'description', 'urutan'])
            ->setDescriptionForEvent(fn(string $eventName) => "Syarat PPDB has been {$eventName}");
    }
}
