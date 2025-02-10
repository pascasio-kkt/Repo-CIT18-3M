<?php

namespace App\Http\Controllers;

use App\Models\ItemTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ItemTaskController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    protected $itemTask;

    public function __construct(ItemTask $itemTask)
    {
        $this->itemTask = $itemTask;
    }

    public function index()
    {
        return ItemTask::query()->get();
    }

    public function create()
    {
        return view('itemtask.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean'
        ]);

        return $this->itemTask->addItem($validated);
    }

    public function show(ItemTask $itemtask)
    {
        return $itemtask;
    }

    public function edit(ItemTask $itemtask)
    {
        return view('itemtask.edit', compact('itemtask'));
    }

    public function update(Request $request, ItemTask $itemtask)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'boolean'
        ]);

        return $this->itemTask->updateItem($itemtask->id, $validated);
    }

    public function destroy(ItemTask $itemtask)
    {
        $this->itemTask->deleteItem($itemtask->id);
        return Response::noContent();
    }
} 