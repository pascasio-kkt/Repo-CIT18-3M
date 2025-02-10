<?php

namespace App\Http\Controllers;

use App\Models\ItemTask;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemTaskController extends Controller
{
    public function index()
    {
        return ItemTask::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean'
        ]);

        return ItemTask::create($validated);
    }

    public function show(ItemTask $itemtask)
    {
        return $itemtask;
    }

    public function update(Request $request, ItemTask $itemtask)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean'
        ]);

        $itemtask->update($validated);
        return $itemtask;
    }

    public function destroy(ItemTask $itemtask)
    {
        $itemtask->delete();
        return response()->noContent();
    }
} 