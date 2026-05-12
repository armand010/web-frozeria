<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return redirect()->route('dashboard'); // Items are mostly managed on dashboard
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'unit' => 'required|string|max:50',
            'current_stock' => 'required|integer|min:0',
            'min_stock' => 'required|integer|min:0',
            'sell_price' => 'required|integer|min:0',
            'buy_price' => 'required|integer|min:0',
            'weight_size' => 'nullable|string|max:100',
            'storage_location' => 'nullable|string|max:100',
            'description' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('items', 'public');
        }

        \App\Models\Item::create($validated);

        return redirect()->route('dashboard')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $item = \App\Models\Item::with('category')->findOrFail($id);
        return view('items.show', compact('item'));
    }

    public function edit(string $id)
    {
        $item = \App\Models\Item::findOrFail($id);
        $categories = \App\Models\Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $item = \App\Models\Item::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'unit' => 'required|string|max:50',
            'current_stock' => 'required|integer|min:0',
            'min_stock' => 'required|integer|min:0',
            'sell_price' => 'required|integer|min:0',
            'buy_price' => 'required|integer|min:0',
            'weight_size' => 'nullable|string|max:100',
            'storage_location' => 'nullable|string|max:100',
            'description' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($item->image);
            }
            $validated['image'] = $request->file('image')->store('items', 'public');
        }

        $item->update($validated);

        return redirect()->route('dashboard')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $item = \App\Models\Item::findOrFail($id);
        
        if ($item->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($item->image);
        }
        
        $item->delete();

        return redirect()->route('dashboard')->with('success', 'Barang berhasil dihapus.');
    }
}
