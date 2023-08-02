<?php


namespace App\Models;


use App\Enums\NewsStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'author',
        'status',
        'description',
        'category_id'
    ];

    /* Relations */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categories(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(
            Category::class,
            'id',
            'category_id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function source(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(
            Category::class,
            'id',
            'source_id'
        );
    }


    /* Scopes's */
    public function scopeActive(Builder $query): void
    {
        $query->where('status', NewsStatus::$ACTIVE);
    }

    public function scopeDraft(Builder $query): void
    {
        $query->where('status', NewsStatus::$DRAFT);
    }

    public function scopeBlocked(Builder $query): void
    {
        $query->where('status', NewsStatus::$BLOCKED);
    }
}
