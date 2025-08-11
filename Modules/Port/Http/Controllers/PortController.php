<?php

namespace Modules\Port\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Port\App\Models\Port;
use Illuminate\Validation\Rule;

class PortController extends Controller
{
    public function index(Request $request)
    {
        // Har page pe 5 ports
        $ports = Port::paginate(5);

        // Table format me response
        return response()->json([
            'data' => $ports->items(), // current page ka data
            'current_page' => $ports->currentPage(),
            'per_page' => $ports->perPage(),
            'total' => $ports->total(),
            'last_page' => $ports->lastPage(),
            'from' => $ports->firstItem(),
            'to' => $ports->lastItem(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'port_name' => 'required|string|unique:ports,port_name',
            'port_type' => ['required', Rule::in(['POD', 'POA'])],
            'status' => ['nullable', Rule::in(['active', 'disabled'])],
        ]);

        $port = Port::create($validated);
        return response()->json($port, 201);
    }

    public function show($id)
    {
        $port = Port::findOrFail($id);
        return response()->json($port);
    }

    public function update(Request $request, $id)
    {
        $port = Port::findOrFail($id);

        $validated = $request->validate([
            'port_name' => [
                'required',
                'string',
                Rule::unique('ports', 'port_name')->ignore($port->id)
            ],
            'port_type' => ['required', Rule::in(['POD', 'POA'])],
            'status' => ['required', Rule::in(['active', 'disabled'])],
        ]);

        $port->update($validated);
        return response()->json($port);
    }

    public function destroy($id)
    {
        $port = Port::findOrFail($id);
        $port->delete();
        return response()->json(['message' => 'Port soft deleted']);
    }

    public function deleted()
    {
        return response()->json(Port::onlyTrashed()->get());
    }

    public function restore($id)
    {
        $port = Port::onlyTrashed()->findOrFail($id);
        $port->restore();
        return response()->json(['message' => 'Port restored']);
    }

    public function forceDelete($id)
    {
        $port = Port::onlyTrashed()->findOrFail($id);
        $port->forceDelete();
        return response()->json(['message' => 'Port permanently deleted']);
    }
}
