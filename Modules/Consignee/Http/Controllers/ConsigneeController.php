<?php

namespace Modules\Consignee\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Consignee\App\Models\Consignee;
use Illuminate\Support\Facades\Validator;

class ConsigneeController extends Controller
{


   public function index(Request $request)
{
    $perPage = 5; // number of records per page

    if ($request->has('with_trashed') && $request->with_trashed == true) {
        $consignees = Consignee::withTrashed()->paginate($perPage);
    } else {
        $consignees = Consignee::paginate($perPage);
    }

    return response()->json($consignees);
}


    // Store new consignee
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:consignees,name',
            'address' => 'required|string',
            'address_continued' => 'nullable|string',
            'status' => 'required|in:active,disabled',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $consignee = Consignee::create($request->only(['name', 'address', 'address_continued', 'status']));

        return response()->json($consignee, 201);
    }

    // Show single consignee
    public function show($id)
    {
        $consignee = Consignee::withTrashed()->find($id);

        if (!$consignee) {
            return response()->json(['message' => 'Consignee not found'], 404);
        }

        return response()->json($consignee);
    }

    // Update consignee
    public function update(Request $request, $id)
    {
        $consignee = Consignee::withTrashed()->find($id);

        if (!$consignee) {
            return response()->json(['message' => 'Consignee not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:consignees,name,' . $id,
            'address' => 'required|string',
            'address_continued' => 'nullable|string',
            'status' => 'required|in:active,disabled',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $consignee->update($request->only(['name', 'address', 'address_continued', 'status']));

        return response()->json($consignee);
    }

    // Soft delete
    public function destroy($id)
    {
        $consignee = Consignee::find($id);

        if (!$consignee) {
            return response()->json(['message' => 'Consignee not found'], 404);
        }

        $consignee->delete();

        return response()->json(['message' => 'Consignee soft deleted successfully']);
    }

    // Restore soft deleted
    public function restore($id)
    {
        $consignee = Consignee::onlyTrashed()->find($id);

        if (!$consignee) {
            return response()->json(['message' => 'Consignee not found or not deleted'], 404);
        }

        $consignee->restore();

        return response()->json(['message' => 'Consignee restored successfully']);
    }

    // Force delete
    public function forceDelete($id)
    {
        $consignee = Consignee::onlyTrashed()->find($id);

        if (!$consignee) {
            return response()->json(['message' => 'Consignee not found or not deleted'], 404);
        }

        $consignee->forceDelete();

        return response()->json(['message' => 'Consignee permanently deleted']);
    }
}
