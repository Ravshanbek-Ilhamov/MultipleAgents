<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\AgentProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $agents = Agent::where('parent_id',null)->get(); 
        return view('product.index', compact('products','agents'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(['name' => 'required']);
        Product::create($request->all());
        return redirect()->back()->with('success', 'Product created successfully.');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate(['name' => 'required']);
        $product->update($request->all());
        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }


    public function assign_agent(Request $request)
    {
        $request->validate([
            'agent_id' => 'required|exists:agents,id',
            'product_id' => 'required|exists:products,id',
            'price' => 'required|numeric|min:0',
        ]);
    
        DB::transaction(function () use ($request) {
            $assignments = [[
                'agent_id' => $request->agent_id,
                'product_id' => $request->product_id,
                'price' => $request->price,
            ]];
    
            $childAgents = Agent::where('parent_id', $request->agent_id)->pluck('id');
    
            foreach ($childAgents as $childAgentId) {
                $assignments[] = [
                    'agent_id' => $childAgentId,
                    'product_id' => $request->product_id,
                    'price' => $request->price,
                ];
            }
    
            AgentProduct::insert($assignments);
        });
    
        return redirect()->back()->with('success', 'Product assigned to agent and its children successfully.');
    }
}
