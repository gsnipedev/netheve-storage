<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 * @mixin Builder
 */
class Trx extends Model {
    protected $table = 'trx';

    protected $fillable = [
        'division_id',
        'item_id',
        'remaining_amount'
    ];

    use HasFactory;

    public function items(): BelongsTo {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
