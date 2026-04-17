@extends('admin.layout')

@section('page-title', 'Add New Product - SportFit')
@section('header-title', 'Create New Product')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('admin.product') }}" class="text-gray-600 hover:text-primary transition flex items-center text-sm font-medium">
            <i class="fas fa-arrow-left mr-2"></i> Back to Inventory
        </a>
    </div>

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-6">
                
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Product Details</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Product Name</label>
                            <input type="text" placeholder="e.g. Pro-Dry Men's Compression Shirt" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none transition">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">SKU</label>
                                <input type="text" placeholder="SF-10293" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Brand</label>
                                <input type="text" placeholder="Nike, Adidas, SportFit" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                            <textarea rows="5" placeholder="Mention material (e.g. 100% Polyester), fit, and washing instructions..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none transition"></textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-gray-900">Product Gallery</h3>
                        <span class="text-xs text-gray-500 font-medium">Upload up to 6 images</span>
                    </div>
                    
                    <div class="border-2 border-dashed border-blue-200 rounded-xl p-8 text-center bg-blue-50/30 hover:bg-blue-50 transition cursor-pointer mb-4">
                        <input type="file" name="images[]" multiple class="hidden" id="product-images">
                        <label for="product-images" class="cursor-pointer">
                            <i class="fas fa-images text-4xl text-primary mb-3"></i>
                            <p class="text-sm font-bold text-gray-700">Drop your product photos here</p>
                            <p class="text-xs text-gray-500">Supports: JPG, PNG, WEBP (Max 2MB per file)</p>
                        </label>
                    </div>

                    <div class="grid grid-cols-3 md:grid-cols-6 gap-3">
                        @for ($i = 1; $i <= 6; $i++)
                        <div class="aspect-square bg-gray-50 border border-gray-200 rounded-lg flex items-center justify-center relative group">
                            <i class="fas fa-image text-gray-300"></i>
                            <button class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-5 h-5 text-[10px] opacity-0 group-hover:opacity-100 transition">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-wider">Pricing & Stock</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Base Price ($)</label>
                            <input type="number" step="0.01" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Discount Price ($)</label>
                            <input type="number" step="0.01" class="w-with mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Stock Quantity</label>
                            <input type="number" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary outline-none">
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-wider">Organization</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Category</label>
                            <select class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg text-sm">
                                <option>Select Category</option>
                                <option>Running Shoes</option>
                                <option>Gym Apparel</option>
                                <option>Accessories</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Sizes Available</label>
                            <div class="flex flex-wrap gap-2 mt-2">
                                @foreach(['S', 'M', 'L', 'XL', 'XXL'] as $size)
                                <label class="flex items-center px-3 py-1 border border-gray-200 rounded-lg text-xs cursor-pointer hover:bg-gray-50">
                                    <input type="checkbox" class="mr-2 rounded text-primary"> {{ $size }}
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full bg-primary hover:bg-primaryHover text-white font-bold py-4 rounded-xl shadow-lg transition transform hover:-translate-y-1">
                    Publish Product
                </button>
            </div>
        </div>
    </form>
</div>
@endsection