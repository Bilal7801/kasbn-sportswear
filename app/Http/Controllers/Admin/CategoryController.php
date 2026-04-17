<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Inside CategoryController.php

    public function index(Request $request)
    {
        // 1. Check if products table exists to prevent crash
        $hasProductsTable = Schema::hasTable('products');

        // 2. Base Query
        $query = Category::with('parent');

        if ($hasProductsTable) {
            $query->withCount('products');
        }

        // 3. Dynamic Filtering
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('status') && $request->status !== 'All Status') {
            $query->where('status', $request->status === 'Active');
        }

        // 4. Sorting
        $sort = $request->get('sort');
        if ($sort == 'Sort by Products' && $hasProductsTable) {
            $query->orderBy('products_count', 'desc');
        } elseif ($sort == 'Sort by Date') {
            $query->orderBy('updated_at', 'desc');
        } else {
            $query->orderBy('name', 'asc');
        }

        // 5. Aggregates for Stats (Safely)
        $stats = [
            'total' => Category::count(),
            'active' => Category::where('status', true)->count(),
            'total_products' => $hasProductsTable ? \App\Models\Product::count() : 0,
            'new_this_month' => Category::whereMonth('created_at', now()->month)->count(),
            'most_products' => ($hasProductsTable)
                ? Category::withCount('products')->orderBy('products_count', 'desc')->first()
                : null,
            'recently_updated' => Category::orderBy('updated_at', 'desc')->first(),
        ];

        $categories = $query->paginate(10)->withQueryString();

        // FIX: Path matches your file: views/admin/category.blade.php
        return view('admin.category', compact('categories', 'stats'));
    }

    public function create()
    {
        // Fetch only top-level categories to show in the "Parent Category" dropdown
        $parentCategories = Category::whereNull('parent_id')->get();
        return view('admin.add_category', compact('parentCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories',
            'icon' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status'); // Handles the checkbox logic

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        Category::create($data);

        return redirect()->route('admin.category')->with('success', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        // Get all categories EXCEPT the one we are editing (to prevent a category being its own parent)
        $parentCategories = Category::where('id', '!=', $category->id)
            ->whereNull('parent_id')
            ->get();

        return view('admin.category_edit', compact('category', 'parentCategories'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        // 1. Validation
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 2. Prepare Data
        $data = $request->only(['name', 'description', 'icon', 'parent_id']);

        // Logic for checkbox: if it's not in the request, it means it's unchecked (inactive)
        $data['status'] = $request->has('status') ? 1 : 0;

        // Update slug automatically if name changed
        $data['slug'] = Str::slug($request->name);

        // 3. Handle Image Upload
        if ($request->hasFile('image')) {
            // Delete old image from storage if it exists
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }

            // Store new image
            $path = $request->file('image')->store('categories', 'public');
            $data['image'] = $path;
        }

        // 4. Update Database
        $category->update($data);

        // 5. Redirect with Success Message
        return redirect()->route('admin.category.index')
            ->with('success', 'Category updated successfully!');
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category)
    {
        // Load the parent category name and the count of products
        $category->load('parent');

        // If you have products, you can paginate them here
        $products = Schema::hasTable('products')
            ? $category->products()->paginate(10)
            : collect();

        return view('admin.category_show', compact('category', 'products'));
    }

    public function destroy(Category $category)
    {
        // 1. Check if the category has an image and delete it from storage
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        // 2. Optional: Handle children categories
        // If this is a parent, you might want to set children to 'null' parent_id
        // Category::where('parent_id', $category->id)->update(['parent_id' => null]);

        // 3. Delete the record from the database
        $category->delete();

        // 4. Redirect with a success message
        return redirect()->route('admin.category.index')
            ->with('success', 'Category and its media have been deleted successfully.');
    }
}
