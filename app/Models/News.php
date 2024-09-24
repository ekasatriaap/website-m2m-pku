<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class News extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'news';
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'created_by',
        'id_bidang',
        'status'
    ];

    /**
     * The status of the News
     *
     * @var string
     */
    public const STATUS_DRAFT = 'draft';
    public const STATUS_PUBLISHED = 'publish';
    public const STATUS_SUBMISSION = 'submission';
    public const STATUS_REJECT = 'reject';

    /**
     * The available status of the News
     *
     * @var array
     */
    public const STATUS = [
        self::STATUS_DRAFT,
        self::STATUS_PUBLISHED,
        self::STATUS_SUBMISSION,
        self::STATUS_REJECT
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'slug', 'content', 'status', 'id_bidang', 'image']) // atribut yang ingin dicatat
            ->setDescriptionForEvent(fn(string $eventName) => "News has been {$eventName}");
    }

    public function bidang()
    {
        return $this->hasOne(Bidang::class, 'id', 'id_bidang');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
