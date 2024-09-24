<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Bidang extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $table = 'bidangs';
    protected $fillable = ['nama_bidang'];
    protected $primaryKey = 'id';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nama_bidang']) // atribut yang ingin dicatat
            ->setDescriptionForEvent(fn(string $eventName) => "Bidang has been {$eventName}");
    }
}
