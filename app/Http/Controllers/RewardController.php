<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function index()
    {
        $rewards = Reward::paginate(10);
        return view('backend.reward.index', compact('rewards'));
    }

    public function create()
    {
        return view('backend.reward.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        Reward::create($request->all());
        return redirect()->route('reward.index')->with('success', 'Reward created successfully.');
    }

    public function edit(Reward $reward)
    {
        return view('backend.reward.edit', compact('reward'));
    }

    public function update(Request $request, Reward $reward)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $reward->update($request->all());
        return redirect()->route('reward.index')->with('success', 'Reward updated successfully.');
    }

    public function destroy(Reward $reward)
    {
        $reward->delete();
        return redirect()->route('reward.index')->with('success', 'Reward deleted successfully.');
    }
}
