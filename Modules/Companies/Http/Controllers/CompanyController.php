<?php

namespace Modules\Companies\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Companies\Repositories\CompanyRepository;
use Modules\Companies\Models\Company;
class CompanyController extends Controller
{
public function __construct(CompanyRepository $companyRepo)
{
    $this->companyRepo = $companyRepo;
}

    protected $companyRepo;



  public function index(Request $request)
    {
        // Har page pe 5 companies
        $companies = Company::paginate(5);

        // Table format me response
        return response()->json([
            'data' => $companies->items(), // current page ka data
            'current_page' => $companies->currentPage(),
            'per_page' => $companies->perPage(),
            'total' => $companies->total(),
            'last_page' => $companies->lastPage(),
            'from' => $companies->firstItem(),
            'to' => $companies->lastItem(),
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:companies',
            'email' => 'nullable|email|unique:companies',
            'logo' => 'nullable|string',
            'website' => 'nullable|url',
            'contact' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        return response()->json($this->companyRepo->create($data), 201);
    }

    public function show($id)
    {
        return response()->json($this->companyRepo->find($id));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|unique:companies,slug,' . $id,
            'email' => 'nullable|email|unique:companies,email,' . $id,
            'logo' => 'nullable|string',
            'website' => 'nullable|url',
            'contact' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        return response()->json($this->companyRepo->update($id, $data));
    }

    // ✅ Soft Delete
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete(); // soft delete
        return response()->json(['message' => 'Company soft deleted.']);
    }

    // ✅ Restore
    public function restore($id)
    {
        $company = Company::onlyTrashed()->findOrFail($id);
        $company->restore();
        return response()->json(['message' => 'Company restored successfully.']);
    }

    // ✅ Permanent Delete
    public function forceDelete($id)
    {
        $company = Company::withTrashed()->findOrFail($id);
        $company->forceDelete();
        return response()->json(['message' => 'Company permanently deleted.']);
    }
}
