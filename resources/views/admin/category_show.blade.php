@extends('admin.layout')

@section('page-title', 'Category Details - ' . $category->name)
@section('header-title', 'Category Overview')

@section('content')
<div class="max-w-5xl mx-auto">
    {{-- Top Navigation --}}
    <div class="flex items-center justify-between mb-6">
        <a href="{{ route('admin.category.index') }}" class="text-gray-600 hover:text-blue-600 transition flex items-center font-medium">
            <i class="fas fa-arrow-left mr-2"></i> Back to Categories
        </a>
        <div class="flex gap-2">
            <a href="{{ route('admin.category.edit', $category) }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition text-sm">
                <i class="fas fa-edit mr-1"></i> Edit Category
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Left Column: Main Info --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="font-bold text-gray-900 text-lg">Detailed Information</h3>
                </div>
                <div class="p-6">
                    <div class="mb-6">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Description</label>
                        <p class="text-gray-700 leading-relaxed">
                            {{ $category->description ?: 'No description provided for this category.' }}
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Slug</label>
                            <code class="text-sm bg-gray-100 px-2 py-1 rounded text-blue-600">{{ $category->slug }}</code>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Parent Category</label>
                            <span class="text-gray-900 font-medium">{{ $category->parent->name ?? 'Top Level (None)' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Associated Products Table --}}
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="font-bold text-gray-900">Products in this Category</h3>
                    <span class="bg-blue-100 text-blue-700 text-xs font-bold px-2.5 py-0.5 rounded-full">
                        {{ $products->count() }} Items
                    </span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase">Product Name</th>
                                <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase">Price</th>
                                <th class="px-6 py-3 text-xs font-bold text-gray-500 uppercase">Stock</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($products as $product)
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $product->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">${{ number_format($product->price, 2) }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $product->stock }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-gray-400 italic">
                                        No products linked to this category yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Right Column: Media & Status --}}
        <div class="space-y-6">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 text-center">
                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-4">Category Image</h3>
                <div class="relative inline-block w-full">
                    @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" class="w-full h-48 object-cover rounded-lg border border-gray-200 shadow-sm">
                    @else
                        <div class="w-full h-48 bg-gray-100 rounded-lg flex flex-col items-center justify-center border-2 border-dashed border-gray-200">
                            <i class="{{ $category->icon ?? 'fas fa-folder' }} text-4xl text-gray-300 mb-2"></i>
                            <span class="text-xs text-gray-400">No Image Uploaded</span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-4">Quick Stats</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 text-sm">Status:</span>
                        <span class="px-2 py-1 rounded-full text-xs font-bold {{ $category->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $category->status ? 'Active' : 'Hidden' }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 text-sm">Created:</span>
                        <span class="text-gray-900 text-sm font-medium">{{ $category->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 text-sm">Last Updated:</span>
                        <span class="text-gray-900 text-sm font-medium">{{ $category->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection