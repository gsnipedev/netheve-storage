<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Post
 *
 * @mixin Builder
 */
class Item extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'stock',
        'tag_id',
        'user_id'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, "user_id");
    }

    public function tag(): BelongsTo {
        return $this->belongsTo(Tag::class, "tag_id");
    }
}
