<?php

namespace Modules\Consignee\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsigneeController extends Controller
{

public function index()
{
    return response()->json(Consignee::all());
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string',
        'address_continued' => 'nullable|string',
        'status' => 'required|in:active,disabled'
    ]);

    $consignee = Consignee::create($validated);
    return response()->json($consignee, 201);
}

public function show($id)
{
    return response()->json(Consignee::findOrFail($id));
}

public function update(Request $request, $id)
{
    $consignee = Consignee::findOrFail($id);
    $validated = $request->validate([
        'name' => 'sometimes|required|string|max:255',
        'address' => 'sometimes|required|string',
        'address_continued' => 'nullable|string',
        'status' => 'in:active,disabled'
    ]);
    $consignee->update($validated);
    return response()->json($consignee);
}

public function destroy($id)
{
    $consignee = Consignee::findOrFail($id);
    $consignee->delete();
    return response()->json(['message' => 'Soft deleted successfully.']);
}

public function restore($id)
{
    $consignee = Consignee::withTrashed()->findOrFail($id);
    $consignee->restore();
    return response()->json(['message' => 'Restored successfully.']);
}

public function forceDelete($id)
{
    $consignee = Consignee::withTrashed()->findOrFail($id);
    $consignee->forceDelete();
    return response()->json(['message' => 'Permanently deleted.']);
}

}
