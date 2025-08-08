<?php

namespace Modules\Port\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Port\App\Models\Port;

use Illuminate\Validation\Rule;

class PortController extends Controller
{
    public function index()
    {
        return response()->json(Port::all());
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
