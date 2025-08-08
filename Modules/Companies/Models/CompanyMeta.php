<?php
namespace Modules\Companies\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Companies\Models\Company;

class CompanyMeta extends Model
{
    use SoftDeletes;

    protected $table = 'companies_meta';
    protected $fillable = ['company_id','key','value'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
