@extends('admin.layout')

@section('page-title', 'Products - Sportswear Management')
@section('header-title', 'Sportswear Products')

@section('content')
    <div class="mb-6">
        {{-- FLASH MESSAGES (The small notification messages at the top) --}}
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl flex items-center shadow-sm animate-fade-in">
                <i class="fas fa-check-circle mr-3 text-lg text-green-500"></i>
                <div class="text-sm font-semibold">{{ session('success') }}</div>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl flex items-center shadow-sm animate-fade-in">
                <i class="fas fa-exclamation-circle mr-3 text-lg text-red-500"></i>
                <div class="text-sm font-semibold">{{ session('error') }}</div>
            </div>
        @endif

        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Sportswear Products</h2>
                <p class="text-gray-600 mt-1">Manage your sportswear inventory, descriptions, and SEO metadata</p>
            </div>
            <a href="{{ route('admin.product.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-sm transition flex items-center font-semibold text-sm">
                <i class="fas fa-plus mr-2"></i> Add New Product
            </a>
        </div>

        {{-- Statistics Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6">
            <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-blue-100 text-blue-600 mr-4">
                        <i class="fas fa-tshirt text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Total Products</p>
                        <h3 class="text-xl font-bold text-gray-900">{{ $stats['total'] ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-green-100 text-green-600 mr-4">
                        <i class="fas fa-check-circle text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Active Products</p>
                        <h3 class="text-xl font-bold text-gray-900">{{ $stats['active'] ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-yellow-100 text-yellow-600 mr-4">
                        <i class="fas fa-clock text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Low Stock</p>
                        <h3 class="text-xl font-bold text-gray-900">{{ $stats['low_stock'] ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-purple-100 text-purple-600 mr-4">
                        <i class="fas fa-dollar-sign text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Total Value</p>
                        <h3 class="text-xl font-bold text-gray-900">
                            ${{ number_format((float) ($stats['total_value'] ?? 0), 2) }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Filter and Search Form --}}
    <form action="{{ route('admin.product.index') }}" method="GET"
        class="bg-white border border-gray-200 rounded-xl p-4 mb-6 shadow-sm">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="relative flex-1">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..."
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none text-sm">
            </div>

            <div class="flex flex-wrap gap-2">
                <select name="category" class="border border-gray-300 rounded-lg px-3 py-2 text-sm bg-white outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit"
                    class="bg-gray-800 hover:bg-black text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                    Filter
                </button>
                @if (request()->has('search') || request()->has('category'))
                    <a href="{{ route('admin.product.index') }}"
                        class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-gray-300 transition">
                        Clear
                    </a>
                @endif
            </div>
        </div>
    </form>

    {{-- Products Table Container --}}
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between bg-gray-50">
            <h3 class="font-bold text-gray-900">All Products</h3>
            <span class="text-xs bg-gray-200 text-gray-700 font-semibold px-2.5 py-1 rounded-full">{{ $products->total() }} items found</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-100 border-b border-gray-200">
                    <tr>
                        <th class="py-3 px-6 text-left text-xs font-bold text-gray-600 uppercase tracking-wider w-1/3">Product Info & Description</th>
                        <th class="py-3 px-6 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Category</th>
                        <th class="py-3 px-6 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Pricing</th>
                        <th class="py-3 px-6 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Inventory Stock</th>
                        <th class="py-3 px-6 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="py-3 px-6 text-right text-xs font-bold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($products as $product)
                        <tr class="hover:bg-gray-50/70 transition">
                            {{-- Product Title, Thumb, Slug, & Dynamic Description --}}
                            <td class="py-4 px-6">
                                <div class="flex items-start">
                                    <div class="h-11 w-11 shrink-0 mr-3 mt-0.5">
                                        @if ($product->images && $product->images->isNotEmpty())
                                            <img class="h-11 w-11 rounded-lg object-cover border border-gray-200 shadow-sm"
                                                src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                                alt="{{ $product->name }}">
                                        @else
                                            <div class="h-11 w-11 rounded-lg bg-gray-100 border border-gray-200 flex items-center justify-center text-gray-400">
                                                <i class="fas fa-image text-sm"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="max-w-md">
                                        <div class="text-sm font-semibold text-gray-900 truncate" title="{{ $product->name }}">{{ $product->name }}</div>
                                        <div class="text-[11px] text-gray-400 font-mono truncate" title="{{ $product->slug }}">slug: /{{ $product->slug }}</div>
                                        
                                        {{-- Dynamic Description line replace --}}
                                        <div class="text-xs text-gray-500 mt-1 line-clamp-2 whitespace-normal leading-relaxed" title="{{ $product->description }}">
                                            {{ $product->description ?? 'No description layout configured.' }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            
                            {{-- Category row --}}
                            <td class="py-4 px-6 whitespace-nowrap">
                                <span class="text-sm text-gray-700 font-medium bg-gray-100 px-2 py-1 rounded-md">
                                    {{ $product->category->name ?? 'Uncategorized' }}
                                </span>
                            </td>

                            {{-- Pricing row (Retail & Bulk concurrent layout configuration) --}}
                            <td class="py-4 px-6 whitespace-nowrap text-sm">
                                <div class="font-bold text-gray-900">${{ number_format($product->price, 2) }} <span class="text-[10px] uppercase tracking-wider text-gray-400 font-normal">Retail</span></div>
                                @if ($product->bulk_price)
                                    <div class="text-xs text-purple-600 font-semibold mt-0.5">${{ number_format($product->bulk_price, 2) }} <span class="text-[9px] uppercase tracking-wider text-purple-400 font-normal">Bulk</span></div>
                                @else
                                    <div class="text-[11px] text-gray-400 italic mt-0.5">No Bulk Rate</div>
                                @endif
                            </td>

                            {{-- Stock Tracking row --}}
                            <td class="py-4 px-6 whitespace-nowrap">
                                <div class="text-sm font-bold {{ $product->stock <= 5 ? 'text-red-600' : 'text-gray-900' }}">
                                    {{ $product->stock }} units
                                </div>
                                <div class="w-24 bg-gray-200 rounded-full h-1.5 mt-1">
                                    <div class="{{ $product->stock <= 5 ? 'bg-red-500' : 'bg-green-500' }} h-1.5 rounded-full"
                                        style="width: {{ min(($product->stock / 100) * 100, 100) }}%"></div>
                                </div>
                            </td>

                            {{-- Status Badge row --}}
                            <td class="py-4 px-6 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $product->status ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-red-50 text-red-700 border border-red-200' }}">
                                    <i class="fas fa-circle mr-1.5 text-[6px]"></i>
                                    {{ $product->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            {{-- Actions row --}}
                            <td class="py-4 px-6 text-sm text-right whitespace-nowrap space-x-3">
                                <a href="{{ route('admin.product.edit', $product) }}"
                                    class="text-blue-600 hover:text-blue-900 inline-block bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition" title="Edit Product">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.product.destroy', $product) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this product? This will also permanently clean up all physical gallery images.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition" title="Delete Product">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-box-open text-gray-300 text-4xl mb-3"></i>
                                    <p class="text-gray-500 text-base font-medium">No sportswear products found matching your search parameters.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination footer block --}}
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
@endsection