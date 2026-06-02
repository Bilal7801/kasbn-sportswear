@extends('admin.layout')

@section('page-title', 'Edit Product - ' . $product->name)

@section('content')
<div class="max-w-5xl mx-auto">
    {{-- Back Button --}}
    <div class="mb-5">
        <a href="{{ route('admin.product.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold text-sm rounded-lg transition border border-gray-200 shadow-sm">
            <i class="fas fa-arrow-left mr-2"></i> Back to Products
        </a>
    </div>

    {{-- Error Validation Alerts --}}
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl shadow-sm">
            <div class="flex items-center mb-2 font-bold text-sm">
                <i class="fas fa-exclamation-triangle mr-2 text-red-500"></i>
                Please correct the following errors:
            </div>
            <ul class="list-disc list-inside text-xs space-y-1 font-medium pl-1 text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
                            <input type="text" name="name" id="product_name" value="{{ old('name', $product->name) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                            <textarea name="description" id="product_description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Write something about the product...">{{ old('description', $product->description) }}</textarea>
                        </div>

                        {{-- SEO Keyword Section with Smart Suggester --}}
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 space-y-3">
                            <div class="flex items-center justify-between">
                                <label class="block text-sm font-semibold text-gray-700">SEO Keywords</label>
                                <button type="button" onclick="autoGenerateKeywords()" class="text-xs bg-blue-50 hover:bg-blue-100 text-blue-600 font-bold py-1 px-2.5 rounded-lg border border-blue-200 transition flex items-center gap-1">
                                    <span>🪄</span> Auto-Generate from Info
                                </button>
                            </div>
                            <input type="text" name="keywords" id="product_keywords" value="{{ old('keywords', $product->keywords) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 bg-white" placeholder="e.g. jacket, leather, breathable, running">
                            <p class="text-xs text-gray-400">Separate keywords with commas.</p>
                            
                            {{-- Quick-Click Suggestion Chest --}}
                            <div>
                                <span class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Quick-Add Popular Tags:</span>
                                <div class="flex flex-wrap gap-1.5" id="suggested_badges_container">
                                    @foreach(['sportswear', 'breathable', 'fitness', 'gym', 'training', 'running', 'comfort-fit', 'athletic', 'unisex', 'durable'] as $tag)
                                        <button type="button" onclick="toggleKeywordTag('{{ $tag }}')" data-tag="{{ $tag }}" class="keyword-badge text-xs px-2.5 py-1 rounded-md border border-gray-200 bg-white hover:bg-gray-100 text-gray-600 font-medium transition">
                                            + {{ $tag }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Regular Price ($)</label>
                                <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Bulk Price ($)</label>
                                <input type="number" step="0.01" name="bulk_price" value="{{ old('bulk_price', $product->bulk_price) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Stock Quantity</label>
                                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Category</label>
                            <select name="category_id" id="product_category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
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
                    <div class="grid grid-cols-4 gap-4 mb-6">
                        @forelse($product->images as $image)
                            <div class="relative h-24 bg-gray-100 rounded-lg overflow-hidden border border-gray-200 group">
                                <img src="{{ asset('storage/' . $image->image_path) }}" class="w-full h-full object-cover">
                            </div>
                        @empty
                            <p class="text-xs text-gray-400 col-span-4 italic">No active images uploaded for this product.</p>
                        @endforelse
                    </div>

                    <h3 class="text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide text-xs">Add / Overwrite Photos</h3>
                    <div class="border-2 border-dashed border-gray-200 rounded-xl p-8 text-center hover:border-blue-500 transition">
                        <input type="file" name="images[]" id="images" multiple class="hidden" accept="image/*" onchange="previewMultipleImages(this)">
                        <label for="images" class="cursor-pointer">
                            <i class="fas fa-plus-circle text-4xl text-gray-300 mb-3"></i>
                            <p class="text-sm text-gray-600">Upload replacement photos</p>
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
                        <input type="checkbox" name="status" value="1" {{ old('status', $product->status) ? 'checked' : '' }} class="w-5 h-5 text-blue-600 rounded">
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-lg transition">
                        <i class="fas fa-sync mr-2"></i> Update Product
                    </button>
                    <a href="{{ route('admin.product.index') }}" class="block text-center mt-4 text-sm text-gray-500 hover:text-gray-700 font-medium">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
// Fire highlight setup on page load for the edit form's current values
document.addEventListener("DOMContentLoaded", function() {
    updateBadgeHighlights();
});

function toggleKeywordTag(tag) {
    const input = document.getElementById('product_keywords');
    let currentTokens = input.value.split(',').map(t => t.trim()).filter(t => t !== "");
    
    if (currentTokens.includes(tag)) {
        currentTokens = currentTokens.filter(t => t !== tag);
    } else {
        currentTokens.push(tag);
    }
    
    input.value = currentTokens.join(', ');
    updateBadgeHighlights();
}

function updateBadgeHighlights() {
    const input = document.getElementById('product_keywords');
    if (!input) return;
    const currentTokens = input.value.split(',').map(t => t.trim().toLowerCase());
    
    document.querySelectorAll('.keyword-badge').forEach(badge => {
        const tag = badge.getAttribute('data-tag').toLowerCase();
        if (currentTokens.includes(tag)) {
            badge.className = "keyword-badge text-xs px-2.5 py-1 rounded-md border border-blue-500 bg-blue-50 text-blue-700 font-semibold transition shadow-sm";
            badge.innerHTML = `✓ ${badge.getAttribute('data-tag')}`;
        } else {
            badge.className = "keyword-badge text-xs px-2.5 py-1 rounded-md border border-gray-200 bg-white hover:bg-gray-100 text-gray-600 font-medium transition";
            badge.innerHTML = `+ ${badge.getAttribute('data-tag')}`;
        }
    });
}

function autoGenerateKeywords() {
    const nameValue = document.getElementById('product_name').value;
    const descValue = document.getElementById('product_description').value;
    const catSelect = document.getElementById('product_category');
    const catText = catSelect.options[catSelect.selectedIndex] ? catSelect.options[catSelect.selectedIndex].text : '';

    const stopWords = ['the', 'and', 'with', 'for', 'this', 'that', 'your', 'from', 'best', 'high', 'good', 'quality'];
    let combinedText = `${nameValue} ${descValue} ${catText}`.toLowerCase();
    
    let words = combinedText.replace(/[^a-zA-Z0-9\s-]/g, ' ').split(/\s+/);
    
    let generatedTags = [];
    words.forEach(word => {
        word = word.trim();
        if (word.length > 3 && !stopWords.includes(word) && !isNaN(word) === false) {
            if (!generatedTags.includes(word)) {
                generatedTags.push(word);
            }
        }
    });

    if(generatedTags.length === 0) return;

    const input = document.getElementById('product_keywords');
    let absoluteCurrent = input.value.split(',').map(t => t.trim()).filter(t => t !== "");
    
    generatedTags.forEach(tag => {
        if (!absoluteCurrent.includes(tag)) {
            absoluteCurrent.push(tag);
        }
    });

    input.value = absoluteCurrent.join(', ');
    updateBadgeHighlights();
}

document.getElementById('product_keywords').addEventListener('input', updateBadgeHighlights);

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