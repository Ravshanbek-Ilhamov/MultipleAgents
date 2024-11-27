<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\AgentProduct;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::where('parent_id',null)->get(); 
        return view('agent.index', compact('agents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:agents,email',
            'parent_id' => 'nullable|exists:agents,id',
        ]);

        Agent::create($request->all());
        return redirect()->route('agents.index')->with('success', 'Agent created successfully.');
    }

    public function update(Request $request, Agent $agent)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:agents,email,' . $agent->id,
            'parent_id' => 'nullable|exists:agents,id',
        ]);

        $agent->update($request->all());
        return redirect()->route('agents.index')->with('success', 'Agent updated successfully.');
    }

    public function destroy(Agent $agent)
    {
        $agent->delete();
        return redirect()->route('agents.index')->with('success', 'Agent deleted successfully.');
    }

    public function child_Agent($id){

        $agents = Agent::where('parent_id',$id)->get();
        $parent = Agent::find($id);
        $allagents = Agent::all(); 

        session(['parent' => $parent]);
        return view('agent.index', compact('agents','allagents'));
    }

}
