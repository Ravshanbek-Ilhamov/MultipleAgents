<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\AgentProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class AgentProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agentproducts = AgentProduct::all();
        $agents = Agent::all();
        $products = Product::all();
        return view('agentproduct.index',compact('agentproducts','agents','products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AgentProduct $agentProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AgentProduct $agentProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $agentproduct = AgentProduct::findOrFail($id);
        $agentproduct->update($request->all());
        return redirect()->back()->with('success', 'Agent Product updated successfully.');
    }
    
    public function destroy($id)
    {
        AgentProduct::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Agent Product deleted successfully.');
    }
    
}
