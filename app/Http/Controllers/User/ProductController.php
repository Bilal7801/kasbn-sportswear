<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show welcome page with products
     */
    public function showWelcome()
    {
        $products = Product::with(['category', 'images'])
            ->where('status', 1)
            ->latest()
            ->limit(6)
            ->get();

        return view('welcome', compact('products'));
    }

    /**
     * Show all products (full page)
     */
    public function index(Request $request)
    {
        // Build the query with filters and search
        $query = Product::with(['category', 'images'])
            ->where('status', 1) // Only show active products
            ->when($request->search, function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%");
            })
            ->when($request->category, function ($q) use ($request) {
                $q->where('category_id', $request->category);
            });

        // 🔥 CHANGED: Updated from 6 to 8 items per page (2 rows of 4)
        $products = $query->latest()->paginate(8); 
        $categories = Category::where('status', 1)->get();

        return view('user.product_page', compact('products', 'categories'));
    }

    /**
     * Get products for homepage (limited, no pagination)
     */
    public function getHomepageProducts(Request $request)
    {
        $limit = $request->query('limit', 6);
        
        $products = Product::with(['category', 'images'])
            ->where('status', 1)
            ->latest()
            ->limit($limit)
            ->get();

        return view('components.products', compact('products'));
    }

    /**
     * Show single product detail page
     */
    public function show($slug)
    {
        $product = Product::with(['category', 'images'])
            ->where('status', 1)
            ->where('slug', $slug)
            ->firstOrFail();

        // Get related products (same category, excluding current product)
        $relatedProducts = Product::with(['category', 'images'])
            ->where('status', 1)
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->limit(4)
            ->get();

        return view('user.product_detail', compact('product', 'relatedProducts'));
    }

    /**
     * Get products as JSON (for AJAX/JavaScript)
     */
    public function getProductsJson(Request $request)
    {
        $query = Product::with(['category', 'images'])
            ->where('status', 1)
            ->when($request->search, function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%");
            })
            ->when($request->category, function ($q) use ($request) {
                $q->where('category_id', $request->category);
            });

        $products = $query->latest()->get();

        // Format products for frontend
        $formatted = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'stock' => $product->stock,
                'category' => $product->category?->name,
                'image' => $product->primaryImage()?->image_path ?? null,
            ];
        });

        return response()->json($formatted);
    }
}