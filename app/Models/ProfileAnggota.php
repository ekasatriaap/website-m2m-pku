<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ProfileAnggota extends Model
{
    use HasFactory, LogsActivity;
    protected $table = "profile_anggotas";
    protected $fillable = [
        "name",
        "jabatan",
        "description",
        "image",
        "urutan",
        "jenis_profile",
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Profile Anggota has been {$eventName}");
    }
}
