@extends('admin.layout')

@section('page-title', 'Add Sportswear - SportFit')
@section('header-title', 'Create New Product')

@section('content')
<div class="max-w-5xl mx-auto">
    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            {{-- Left: Details --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Product Details</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Product Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Price ($)</label>
                                <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Stock Quantity</label>
                                <input type="number" name="stock" value="{{ old('stock', 0) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Category</label>
                            <select name="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Multi-Image Upload Box --}}
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Product Gallery</h3>
                    <div class="border-2 border-dashed border-gray-200 rounded-xl p-8 text-center hover:border-blue-500 transition">
                        <input type="file" name="images[]" id="images" multiple class="hidden" accept="image/*" onchange="previewMultipleImages(this)">
                        <label for="images" class="cursor-pointer">
                            <i class="fas fa-images text-4xl text-gray-300 mb-3"></i>
                            <p class="text-sm text-gray-600">Click to upload 3-4 high-quality photos</p>
                            <p class="text-xs text-gray-400 mt-1">PNG, JPG up to 2MB each</p>
                        </label>
                    </div>
                    <div id="image_preview_grid" class="grid grid-cols-4 gap-4 mt-4">
                        {{-- Previews will appear here via JS --}}
                    </div>
                </div>
            </div>

            {{-- Right: Status & Save --}}
            <div class="space-y-6">
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-wider">Publication</h3>
                    <div class="flex items-center justify-between mb-6">
                        <span class="text-sm text-gray-600">Active Status</span>
                        <input type="checkbox" name="status" value="1" checked class="w-5 h-5 text-blue-600 rounded">
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-lg transition">
                        <i class="fas fa-save mr-2"></i> Save Product
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function previewMultipleImages(input) {
    const grid = document.getElementById('image_preview_grid');
    grid.innerHTML = ''; // Clear previous
    if (input.files) {
        Array.from(input.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'relative h-24 bg-gray-100 rounded-lg overflow-hidden border border-gray-200';
                div.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                grid.appendChild(div);
            }
            reader.readAsDataURL(file);
        });
    }
}
</script>
@endsection