<?php

namespace Modules\Vendor\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Shipper\App\Models\Shipper;

class Vendor extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'status'];


public function shippers()
{
    return $this->hasMany(\Modules\Shipper\App\Models\Shipper::class, 'vendor_id');
}

}
