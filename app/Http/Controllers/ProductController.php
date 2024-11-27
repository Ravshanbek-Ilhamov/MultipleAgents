<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\AgentProduct;
use App\Models\Product;
use Illuminate\Http\Request;

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

    public function assign_agent(Request $request){

        // dd($request->all());
        AgentProduct::create($request->all());
        return redirect()->back()->with('success', 'Product assigned successfully.');   
    }
}
