<?php

namespace Modules\Companies\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Companies\Models\CompanyMeta;

class CompanyMetaController extends Controller
{
    // ✅ GET: All company meta
    public function index()
    {
        return response()->json(CompanyMeta::all());
    }

    // ✅ GET: Single company meta by ID
    public function show($id)
    {
        $meta = CompanyMeta::findOrFail($id);
        return response()->json($meta);
    }

    // ✅ POST: Create new meta
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'key' => 'required|string',
            'value' => 'nullable|string',
        ]);

        $meta = CompanyMeta::create($validated);

        return response()->json([
            'message' => 'Meta created successfully.',
            'data' => $meta,
        ], 201);
    }

    // ✅ PUT/PATCH: Update meta
    public function update(Request $request, $id)
    {
        $meta = CompanyMeta::findOrFail($id);

        $validated = $request->validate([
            'company_id' => 'sometimes|exists:companies,id',
            'key' => 'sometimes|string',
            'value' => 'nullable|string',
        ]);

        $meta->update($validated);

        return response()->json([
            'message' => 'Meta updated successfully.',
            'data' => $meta,
        ]);
    }

    // ✅ DELETE: Soft delete
    public function destroy($id)
    {
        $meta = CompanyMeta::findOrFail($id);
        $meta->delete();

        return response()->json([
            'message' => 'Meta soft deleted successfully.'
        ]);
    }

    // ✅ POST: Restore soft deleted meta
    public function restore($id)
    {
        $meta = CompanyMeta::onlyTrashed()->findOrFail($id);
        $meta->restore();

        return response()->json([
            'message' => 'Meta restored successfully.'
        ]);
    }

    // ✅ DELETE: Force delete permanently
    public function forceDelete($id)
    {
        $meta = CompanyMeta::withTrashed()->findOrFail($id);
        $meta->forceDelete();

        return response()->json([
            'message' => 'Meta permanently deleted.'
        ]);
    }
}
