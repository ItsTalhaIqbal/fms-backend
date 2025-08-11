<?php

namespace App\Http\Controllers;

use App\Models\Consignee;
use Illuminate\Http\Request;

class ConsigneeController extends Controller
{
    // Get all (active only)
    public function index()
    {
        $consignees = Consignee::paginate(5);
        return response()->json($consignees);
    }

    // Soft delete
    public function destroy($id)
    {
        $consignee = Consignee::findOrFail($id);
        $consignee->delete();

        return response()->json(['message' => 'Consignee soft deleted successfully']);
    }

    // Get all soft deleted
    public function trashed()
    {
        $trashed = Consignee::onlyTrashed()->paginate(5);
        return response()->json($trashed);
    }

    // Restore soft deleted
    public function restore($id)
    {
        $consignee = Consignee::onlyTrashed()->findOrFail($id);
        $consignee->restore();

        return response()->json(['message' => 'Consignee restored successfully']);
    }

    // Force delete
    public function forceDelete($id)
    {
        $consignee = Consignee::onlyTrashed()->findOrFail($id);
        $consignee->forceDelete();

        return response()->json(['message' => 'Consignee permanently deleted successfully']);
    }
}
