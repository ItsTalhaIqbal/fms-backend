<?php

namespace Modules\Companies\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Companies\Database\Factories\CompaniesMetaFactory;

class companies_meta extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): CompaniesMetaFactory
    // {
    //     // return CompaniesMetaFactory::new();
    // }
}
