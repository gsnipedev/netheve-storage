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
class TrxLog extends Model {
    protected $table = 'trx_log';

    protected $fillable = [
        'trx_id',
        'issuer',
        'amount'
    ];

    use HasFactory;

    function trx(): BelongsTo {
        return $this->belongsTo(Trx::class, 'trx_id');
    }

    function issuer(): BelongsTo {
        return $this->belongsTo(User::class, 'issuer');
    }
}
