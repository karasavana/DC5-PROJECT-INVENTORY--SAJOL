<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = Inventory::with('product.supplier')->get();
        return Inertia::render('Inventories/Index', ['inventories' => $inventories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return Inertia::render('Inventories/Create', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:0',
            'location' => 'required|string|max:255',
            'min_stock' => 'required|integer|min:0',
            'max_stock' => 'required|integer|min:0',
            'product_id' => 'required|exists:products,id|unique:inventories,product_id'
        ]);

        Inventory::create($validated);

        return redirect()->route('inventories.index')->with('success', 'Inventory created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        $inventory->load('product.supplier');
        return Inertia::render('Inventories/Show', ['inventory' => $inventory]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        $products = Product::all();
        return Inertia::render('Inventories/Edit', ['inventory' => $inventory, 'products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:0',
            'location' => 'required|string|max:255',
            'min_stock' => 'required|integer|min:0',
            'max_stock' => 'required|integer|min:0',
            'product_id' => 'required|exists:products,id|unique:inventories,product_id,' . $inventory->id
        ]);

        $inventory->update($validated);

        return redirect()->route('inventories.index')->with('success', 'Inventory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventories.index')->with('success', 'Inventory deleted successfully.');
    }
}
