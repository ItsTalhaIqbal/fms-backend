<?php

namespace Modules\Consignee\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consignee extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'address', 'address_continued', 'status'];
}
 