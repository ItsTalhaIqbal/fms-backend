<?php

namespace Modules\Shipper\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Shipper\App\Models\Shipper;

class ShipperController extends Controller
{
    // List all shippers with vendor (paginated)
    public function index(Request $request)
    {
        $shippers = Shipper::with('vendor')->paginate(5);

        return response()->json([
            'data' => $shippers->items(),
            'current_page' => $shippers->currentPage(),
            'per_page' => $shippers->perPage(),
            'total' => $shippers->total(),
            'last_page' => $shippers->lastPage(),
            'from' => $shippers->firstItem(),
            'to' => $shippers->lastItem(),
        ]);
    }

    // Store new shipper
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'name' => 'required|string|max:255',
            'address1' => 'nullable|string',
            'address2' => 'nullable|string',
            'status' => 'required|in:active,disabled',
        ]);

        // Check for duplicate (vendor_id + name)
        $exists = Shipper::where('vendor_id', $validated['vendor_id'])
                         ->where('name', $validated['name'])
                         ->exists();

        if ($exists) {
            return response()->json([
                'error' => 'This vendor + name combination already exists.'
            ], 422);
        }

        $shipper = Shipper::create($validated);

        return response()->json([
            'message' => 'Shipper created successfully.',
            'data' => $shipper
        ], 201);
    }

    // Show single shipper
    public function show($id)
    {
        $shipper = Shipper::with('vendor')->findOrFail($id);

        return response()->json($shipper);
    }

    // Update existing shipper
    public function update(Request $request, $id)
    {
        $shipper = Shipper::findOrFail($id);

        $validated = $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'name' => 'required|string|max:255',
            'address1' => 'nullable|string',
            'address2' => 'nullable|string',
            'status' => 'required|in:active,disabled',
        ]);

        $exists = Shipper::where('vendor_id', $validated['vendor_id'])
                         ->where('name', $validated['name'])
                         ->where('id', '!=', $shipper->id)
                         ->exists();

        if ($exists) {
            return response()->json([
                'error' => 'Duplicate vendor + name combination.'
            ], 422);
        }

        $shipper->update($validated);

        return response()->json([
            'message' => 'Shipper updated successfully.',
            'data' => $shipper
        ]);
    }

    // Soft delete
    public function destroy($id)
    {
        $shipper = Shipper::findOrFail($id);
        $shipper->delete();

        return response()->json([
            'message' => 'Shipper soft deleted successfully.'
        ]);
    }

    // Restore soft-deleted shipper
    public function restore($id)
    {
        $shipper = Shipper::withTrashed()->findOrFail($id);

        if (!$shipper->trashed()) {
            return response()->json([
                'message' => 'Shipper is not deleted.'
            ], 400);
        }

        $shipper->restore();

        return response()->json([
            'message' => 'Shipper restored successfully.'
        ]);
    }

    // Permanently delete
    public function forceDelete($id)
    {
        $shipper = Shipper::withTrashed()->findOrFail($id);
        $shipper->forceDelete();

        return response()->json([
            'message' => 'Shipper permanently deleted.'
        ]);
    }
}
