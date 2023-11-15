<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beverage extends Model
{
    use SoftDeletes, HasUlids;

    protected $fillable = [
        'name',
        'selling_price',
        'purchase_price',
        'quantity',
        'team_id',
    ];
}
