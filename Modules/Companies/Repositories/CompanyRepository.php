<?php

namespace Modules\Companies\Repositories;

use Modules\Companies\Models\Company;


class CompanyRepository
{
    public function all()
    {
        return Company::with('meta')->latest()->get();
    }

    public function find($id)
    {
        return Company::with('meta')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Company::create($data);
    }

    public function update($id, array $data)
    {
        $company = $this->find($id);
        $company->update($data);
        return $company;
    }

    public function delete($id)
    {
        $company = $this->find($id);
        return $company->delete();
    }
}
