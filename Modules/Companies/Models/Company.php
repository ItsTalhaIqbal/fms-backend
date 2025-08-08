<?php
namespace Modules\Companies\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','email','slug','website','contact','address'];

    public function meta()
    {
        return $this->hasMany(CompanyMeta::class);
    }

    protected static function booted()
    {
        static::deleting(function($company){
            if ($company->isForceDeleting()) {
                // Permanent delete => force delete related metas
                $company->meta()->forceDelete();
            } else {
                // Soft delete => soft delete related metas
                $company->meta()->delete();
            }
        });

        static::restoring(function($company){
            // Restore related metas
            $company->meta()->withTrashed()->restore();
        });
    }
}
