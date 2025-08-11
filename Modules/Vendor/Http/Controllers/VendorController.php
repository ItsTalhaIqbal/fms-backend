<?php

namespace Modules\Vendor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Vendor\App\Models\Vendor;

class VendorController extends Controller
{
   public function index()
{
    $vendors = Vendor::paginate(5); // 5 items per page
    return response()->json($vendors);
}


    public function store(Request $request)
    {
        $vendor = Vendor::create($request->validate([
            'name' => 'required|string',
            'status' => 'in:active,disabled',
        ]));

        return response()->json([
            'message' => 'Vendor created successfully.',
            'data' => $vendor
        ], 201);
    }

    public function show($id)
    {
        $vendor = Vendor::with('shippers')->findOrFail($id);

        return response()->json($vendor);
    }

    public function update(Request $request, $id)
    {
        $vendor = Vendor::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'status' => 'in:active,disabled',
        ]);

        $vendor->update($validated);

        return response()->json([
            'message' => 'Vendor updated successfully.',
            'data' => $vendor
        ]);
    }

    public function destroy($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->delete();

        return response()->json(['message' => 'Vendor soft deleted']);
    }

    public function restore($id)
    {
        $vendor = Vendor::withTrashed()->findOrFail($id);
        $vendor->restore();

        return response()->json(['message' => 'Vendor restored']);
    }

    public function forceDelete($id)
    {
        $vendor = Vendor::withTrashed()->findOrFail($id);
        $vendor->forceDelete();

        return response()->json(['message' => 'Vendor permanently deleted']);
    }
}
