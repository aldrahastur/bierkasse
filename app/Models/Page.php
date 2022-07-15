<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $primaryKey = 'slug';

    protected $keyType = 'string';

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
