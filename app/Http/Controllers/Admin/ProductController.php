<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // 1. Build the query with filters
        $query = Product::with(['category', 'images'])
            ->when($request->search, function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%");
            })
            ->when($request->category, function ($q) use ($request) {
                $q->where('category_id', $request->category);
            });

        $products = $query->latest()->paginate(10);
        $categories = Category::all();

        // 2. Calculate stats
        $stats = [
            'total' => Product::count(),
            'active' => Product::where('status', 1)->count(),
            'low_stock' => Product::where('stock', '<=', 5)->count(),
            // Fix: Use selectRaw and first() to get the sum safely
            'total_value' => Product::query()->selectRaw('SUM(price * stock) as total')->value('total') ?? 0,
        ];

        return view('admin.product', compact('products', 'stats', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product_create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048' // Validates each image in array
        ]);

        $product = Product::create($request->except('images') + ['slug' => Str::slug($request->name)]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products', 'public');

                $product->images()->create([
                    'image_path' => $path,
                    'is_primary' => $index === 0, // First image is the main one
                    'sort_order' => $index
                ]);
            }
        }

        return redirect()->route('admin.product.index')->with('success', 'Product created with gallery!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        // Load images to ensure they are available in the view
        $product->load('images');
        return view('admin.product_edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Update basic details
        $product->update($request->except('images') + [
            'slug' => \Illuminate\Support\Str::slug($request->name),
            'status' => $request->has('status') ? 1 : 0,
        ]);

        // Handle new image uploads
        if ($request->hasFile('images')) {
            // Get the current highest sort order to append new images at the end
            $lastOrder = $product->images()->max('sort_order') ?? -1;

            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products', 'public');

                $product->images()->create([
                    'image_path' => $path,
                    'is_primary' => ($lastOrder === -1 && $index === 0), // Primary only if no images existed
                    'sort_order' => $lastOrder + $index + 1
                ]);
            }
        }

        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // 1. Delete all physical image files from storage
        foreach ($product->images as $image) {
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
        }

        // 2. Delete the product record 
        // (Note: If you set up 'onDelete(cascade)' in your migration, 
        // the ProductImage rows in the DB will disappear automatically)
        $product->delete();

        return redirect()->route('admin.product.index')
            ->with('success', 'Product and its gallery deleted successfully.');
    }
}
