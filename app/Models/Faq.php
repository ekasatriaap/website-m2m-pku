<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Faq extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'faqs';
    protected $fillable = ["pertanyaan", "jawaban"];
    protected $primaryKey = 'id';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['pertanyaan', 'jawaban']) // atribut yang ingin dicatat
            ->setDescriptionForEvent(fn(string $eventName) => "Faq has been {$eventName}");
    }
}
