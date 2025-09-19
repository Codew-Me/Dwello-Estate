<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::where('status', true)->latest()->get();
        return view('agents.index', compact('agents'));
    }

    public function show(Agent $agent)
    {
        if (!$agent->status) {
            abort(404);
        }
        return view('agents.show', compact('agent'));
    }

    // Admin methods
    public function adminIndex()
    {
        $user = auth()->user();
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        $agents = Agent::latest()->paginate(10);
        return view('admin.agents.index', compact('agents'));
    }

    public function create()
    {
        $user = auth()->user();
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        return view('admin.agents.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'bio' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'specialization' => 'nullable|string|max:255',
            'experience_years' => 'required|integer|min:0',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('agents', 'public');
        }

        $data['status'] = $request->has('status');

        Agent::create($data);

        return redirect()->route('admin.agents.index')
            ->with('success', 'Agent created successfully.');
    }

    public function edit(Agent $agent)
    {
        $user = auth()->user();
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        return view('admin.agents.edit', compact('agent'));
    }

    public function update(Request $request, Agent $agent)
    {
        $user = auth()->user();
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'bio' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'specialization' => 'nullable|string|max:255',
            'experience_years' => 'required|integer|min:0',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image
            if ($agent->image) {
                Storage::disk('public')->delete($agent->image);
            }
            $data['image'] = $request->file('image')->store('agents', 'public');
        }

        $data['status'] = $request->has('status');

        $agent->update($data);

        return redirect()->route('admin.agents.index')
            ->with('success', 'Agent updated successfully.');
    }

    public function destroy(Agent $agent)
    {
        $user = auth()->user();
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized access');
        }

        // Delete image
        if ($agent->image) {
            Storage::disk('public')->delete($agent->image);
        }

        $agent->delete();

        return redirect()->route('admin.agents.index')
            ->with('success', 'Agent deleted successfully.');
    }
}