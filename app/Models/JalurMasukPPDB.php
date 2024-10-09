<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class JalurMasukPPDB extends Model
{
    use HasFactory, LogsActivity;

    protected $table = "jalur_masuk_ppdb";
    protected $primaryKey = "id";
    protected $fillable = [
        "nama_jalur",
        "description",
        "persyaratan"
    ];

    protected $casts = [
        "persyaratan" => "json",
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Jalur Masuk PPDB berhasil di {$eventName}");
    }
}
