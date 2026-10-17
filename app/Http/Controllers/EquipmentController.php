<?php

// app/Http/Controllers/EquipmentController.php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    // Whitelist: only these fields may be filtered on.
    private array $filterable = ['category', 'condition', 'storage_location', 'name'];

    public function index(Request $request)
    {
        $query = Equipment::query();

        foreach ($this->filterable as $field) {
            if ($request->filled($field)) {
                $query->where($field, $request->query($field));
            }
        }

        return response()->json($query->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'             => 'required|string|max:255',
            'category'         => 'required|string|max:100',
            'quantity'         => 'required|integer|min:0',
            'unit_cost'        => 'required|numeric|min:0',
            'condition'        => 'nullable|string|in:new,good,fair,needs_repair',
            'storage_location' => 'nullable|string|max:255',
        ]);

        return response()->json(Equipment::create($data), 201);
    }

    // Parameter name must match {equipment} in routes/api.php
    public function show(Equipment $equipment)
    {
        return response()->json($equipment, 200);
    }

    public function update(Request $request, Equipment $equipment)
    {
        $data = $request->validate([
            'name'             => 'sometimes|required|string|max:255',
            'category'         => 'sometimes|required|string|max:100',
            'quantity'         => 'sometimes|required|integer|min:0',
            'unit_cost'        => 'sometimes|required|numeric|min:0',
            'condition'        => 'nullable|string|in:new,good,fair,needs_repair',
            'storage_location' => 'nullable|string|max:255',
        ]);

        $equipment->update($data);

        return response()->json($equipment, 200);
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return response()->noContent(); // 204
    }
}
