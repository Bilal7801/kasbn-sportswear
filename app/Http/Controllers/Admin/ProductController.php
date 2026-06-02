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
            'description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'bulk_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Clean, explicit data assembly instead of array union operator
        $data = $request->except('images');
        $data['slug'] = Str::slug($request->name);
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['keywords'] = $request->input('keywords'); // Forced explicit mapping

        $product = Product::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products', 'public');

                $product->images()->create([
                    'image_path' => $path,
                    'is_primary' => $index === 0,
                    'sort_order' => $index
                ]);
            }
        }

        return redirect()->route('admin.product.index')->with('success', 'Product created with gallery!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $product->load('images');
        return view('admin.product_edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'bulk_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Clean, explicit data assembly to prevent missing keys on updates
        $data = $request->except('images');
        $data['slug'] = Str::slug($request->name);
        $data['status'] = $request->has('status') ? 1 : 0;
        $data['keywords'] = $request->input('keywords'); // Forced explicit mapping

        $product->update($data);

        // Handle new image uploads
        if ($request->hasFile('images')) {
            $lastOrder = $product->images()->max('sort_order') ?? -1;

            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products', 'public');

                $product->images()->create([
                    'image_path' => $path,
                    'is_primary' => ($lastOrder === -1 && $index === 0),
                    'sort_order' => $lastOrder + $index + 1
                ]);
            }
        }

        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        foreach ($product->images as $image) {
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
        }

        $product->delete();

        return redirect()->route('admin.product.index')
            ->with('success', 'Product and its gallery deleted successfully.');
    }
}