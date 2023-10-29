<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Tag extends Model {
    protected $table = 'tags';

    protected $fillable = [
        'name'
    ];
    use HasFactory;
}
