<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
