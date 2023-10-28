<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @mixin Builder
 */
class Division extends Model {
    protected $table = 'divisions';

    protected $fillable = [
        'name'
    ];

    use HasFactory;
}
