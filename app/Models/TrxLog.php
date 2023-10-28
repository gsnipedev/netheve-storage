<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
