<?php

namespace App\Http\Controllers;

use App\Models\ItemTask; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ItemTaskController extends Controller 
{
    public function index()
    {
        $itemtasks = ItemTask::all();  
        return view('itemtask.index', compact('itemtasks'));  
    }

    public function create()
    {
        return view('itemtask.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $itemtask = ItemTask::create([  
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => false,
        ]);

        return redirect()->route('itemtask.index')->with('success', 'Task added successfully!');
    }

    public function show(ItemTask $itemtask)  
    {
        return response()->json($itemtask);  
    }

    public function edit(ItemTask $itemtask)  
    {
        return view('itemtask.edit', compact('itemtask'));
    }

    public function update(Request $request, ItemTask $itemtask)  
    {
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
        ]);

        $itemtask->update($request->all());  

        return Redirect::route('itemtask.index')->with('success', 'Task updated successfully!');
    }

    public function destroy(ItemTask $itemtask) 
    {
        $itemtask->delete();  
        return redirect()->route('itemtask.index')->with('success', 'Task deleted successfully!');
    }
}
