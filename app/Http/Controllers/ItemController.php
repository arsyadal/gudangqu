<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    
    // Display a listing of the items
    public function index()
    {
        $items = Item::with('category', 'supplier')->get();
        return view('items.index', compact('items'));
    }

    // Show the form for creating a new item
    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('items.create', compact('categories', 'suppliers'));
    }

    // Store a newly created item in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    // Display the specified item
    public function show($id)
    {
        $item = Item::with('category', 'supplier')->findOrFail($id);
        return view('items.show', compact('item'));
    }

    // Show the form for editing the specified item
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all(); // Untuk dropdown kategori
        $suppliers = Supplier::all(); // Untuk dropdown pemasok
        return view('items.edit', compact('item', 'categories', 'suppliers'));
    }
    
    // Update the specified item in storage
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);
    
        $item = Item::findOrFail($id);
        $item->update($validatedData);
    
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    // Remove the specified item from storage
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
    
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
    
    public function home()
    {
        $totalItems = Item::count();
        $totalCategories = Category::count();
        $totalSuppliers = Supplier::count();

        return view('home', compact('totalItems', 'totalCategories', 'totalSuppliers'));
    }
}

    


   // Metode untuk menampilkan Home Page


