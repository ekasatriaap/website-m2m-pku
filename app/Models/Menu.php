<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Menu extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'menus';
    protected $fillable = [
        'nama_menu',
        'url',
        'icon',
        'parent_id',
        'urutan',
        'target',
        'type',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Menu has been {$eventName}");
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id');
    }
}
