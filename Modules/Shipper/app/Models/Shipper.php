<?php

namespace Modules\Shipper\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Vendor\App\Models\Vendor;

class Shipper extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'shippers';

    protected $fillable = [
        'vendor_id',
        'name',
        'address1',
        'address2',
        'status',
    ];

    protected $dates = ['deleted_at'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
