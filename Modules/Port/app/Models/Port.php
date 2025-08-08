<?php

namespace Modules\Port\App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Port extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'port_name',
        'port_type',
        'status',
    ];
}
