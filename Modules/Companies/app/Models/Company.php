<?php

namespace Modules\Companies\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Companies\Database\Factories\CompaniesFactory;

class company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'contact',
        'address',
        'logo',
        'website',
    ];
}
