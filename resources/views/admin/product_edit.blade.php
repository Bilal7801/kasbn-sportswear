@extends('admin.layout')

@section('page-title', 'Edit Product - ' . $product->name)

@section('content')
<div class="max-w-5xl mx-auto">
    <form action="{{ route('admin.product.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            {{-- Left: Details --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Edit Product Details</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Product Name</label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Price ($)</label>
                                <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Stock Quantity</label>
                                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Category</label>
                            <select name="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Image Gallery Management --}}
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Current Gallery</h3>
                    
                    {{-- Existing Images --}}
                    <div class="grid grid-cols-4 gap-4 mb-6">
                        @foreach($product->images as $image)
                            <div class="relative h-24 bg-gray-100 rounded-lg overflow-hidden border border-gray-200 group">
                                <img src="{{ asset('storage/' . $image->image_path) }}" class="w-full h-full object-cover">
                                {{-- We'll add a delete feature for individual images later if needed --}}
                            </div>
                        @endforeach
                    </div>

                    <h3 class="text-sm font-bold text-gray-700 mb-2 uppercase">Add New Photos</h3>
                    <div class="border-2 border-dashed border-gray-200 rounded-xl p-8 text-center hover:border-blue-500 transition">
                        <input type="file" name="images[]" id="images" multiple class="hidden" accept="image/*" onchange="previewMultipleImages(this)">
                        <label for="images" class="cursor-pointer">
                            <i class="fas fa-plus-circle text-4xl text-gray-300 mb-3"></i>
                            <p class="text-sm text-gray-600">Upload more photos</p>
                        </label>
                    </div>
                    <div id="image_preview_grid" class="grid grid-cols-4 gap-4 mt-4"></div>
                </div>
            </div>

            {{-- Right: Status & Update --}}
            <div class="space-y-6">
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-wider">Status</h3>
                    <div class="flex items-center justify-between mb-6">
                        <span class="text-sm text-gray-600">Active Status</span>
                        <input type="checkbox" name="status" value="1" {{ $product->status ? 'checked' : '' }} class="w-5 h-5 text-blue-600 rounded">
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-lg transition">
                        <i class="fas fa-sync mr-2"></i> Update Product
                    </button>
                    <a href="{{ route('admin.product.index') }}" class="block text-center mt-4 text-sm text-gray-500 hover:text-gray-700">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
// Reuse your existing JS for the new image previews
function previewMultipleImages(input) {
    const grid = document.getElementById('image_preview_grid');
    grid.innerHTML = ''; 
    if (input.files) {
        Array.from(input.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'relative h-24 bg-gray-100 rounded-lg overflow-hidden border border-blue-200';
                div.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                grid.appendChild(div);
            }
            reader.readAsDataURL(file);
        });
    }
}
</script>
@endsection