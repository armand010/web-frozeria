<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Info Cards
        $totalItems = \App\Models\Item::count();
        $totalCategories = \App\Models\Category::count();
        $lowStockItems = \App\Models\Item::where('current_stock', '<', 20)->where('current_stock', '>', 0)->count();
        $outOfStockItems = \App\Models\Item::where('current_stock', 0)->count();

        // Query Items
        $query = \App\Models\Item::with('category');

        // Search by name
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $items = $query->latest()->paginate(10);
        $categories = \App\Models\Category::all();

        return view('dashboard.index', compact('items', 'categories', 'totalItems', 'totalCategories', 'lowStockItems', 'outOfStockItems'));
    }
}
