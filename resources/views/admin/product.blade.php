@extends('admin.layout')

@section('page-title', 'Products - Sportswear Management')
@section('header-title', 'Sportswear Products')

@section('content')
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Sportswear Products</h2>
                <p class="text-gray-600 mt-1">Manage your sportswear inventory and collections</p>
            </div>
            <a href="{{ route('admin.product.create') }}"
                class="bg-primary hover:bg-primaryHover text-white px-4 py-2 rounded-lg shadow-sm transition flex items-center">
                <i class="fas fa-plus mr-2"></i> Add New Product
            </a>
        </div>

        {{-- Statistics Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6">
            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-blue-100 text-blue-600 mr-4">
                        <i class="fas fa-tshirt text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Total Products</p>
                        <h3 class="text-xl font-bold text-gray-900">{{ $stats['total'] ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-green-100 text-green-600 mr-4">
                        <i class="fas fa-check-circle text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Active Products</p>
                        <h3 class="text-xl font-bold text-gray-900">{{ $stats['active'] ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-yellow-100 text-yellow-600 mr-4">
                        <i class="fas fa-clock text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Low Stock</p>
                        <h3 class="text-xl font-bold text-gray-900">{{ $stats['low_stock'] ?? 0 }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-purple-100 text-purple-600 mr-4">
                        <i class="fas fa-dollar-sign text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Total Value</p>
                        <h3 class="text-xl font-bold text-gray-900">
                            {{-- Fixed the sum error by adding a fallback value --}}
                            ${{ number_format((float) ($stats['total_value'] ?? 0), 2) }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Filter and Search Form --}}
    <form action="{{ route('admin.product.index') }}" method="GET"
        class="bg-white border border-gray-200 rounded-lg p-4 mb-6 shadow-sm">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="relative flex-1">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..."
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div class="flex flex-wrap gap-2">
                <select name="category" class="border border-gray-300 rounded-lg px-3 py-2 text-sm">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit"
                    class="bg-gray-800 hover:bg-black text-white px-4 py-2 rounded-lg text-sm transition">
                    Filter
                </button>
                @if (request()->has('search') || request()->has('category'))
                    <a href="{{ route('admin.product.index') }}"
                        class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm hover:bg-gray-300">
                        Clear
                    </a>
                @endif
            </div>
        </div>
    </form>

    {{-- Products Table --}}
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="font-semibold text-gray-900">All Products</h3>
            <span class="text-sm text-gray-500">{{ $products->total() }} items found</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase">Stock</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="py-3 px-6 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($products as $product)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 shrink-0 mr-3">
                                        @if ($product->images && $product->images->isNotEmpty())
                                            <img class="h-10 w-10 rounded-lg object-cover"
                                                src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                                alt="{{ $product->name }}">
                                        @else
                                            <div
                                                class="h-10 w-10 rounded-lg bg-gray-100 flex items-center justify-center text-gray-400">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                                        <div class="text-sm text-gray-500">SKU: {{ $product->sku ?? 'N/A' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="text-sm text-gray-900">{{ $product->category->name ?? 'Uncategorized' }}</div>
                            </td>
                            <td class="py-4 px-6 text-sm">
                                <div class="font-medium text-gray-900">${{ number_format($product->price, 2) }}</div>
                                @if ($product->sale_price)
                                    <div class="text-xs text-green-600">${{ number_format($product->sale_price, 2) }}
                                        (sale)</div>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <div
                                    class="text-sm font-medium {{ $product->stock <= 5 ? 'text-red-600 font-bold' : 'text-gray-900' }}">
                                    {{ $product->stock }}
                                </div>
                                <div class="w-24 bg-gray-200 rounded-full h-1.5 mt-1">
                                    <div class="{{ $product->stock <= 5 ? 'bg-red-500' : 'bg-green-500' }} h-1.5 rounded-full"
                                        style="width: {{ min(($product->stock / 100) * 100, 100) }}%"></div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $product->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    <i class="fas fa-circle mr-1" style="font-size: 6px"></i>
                                    {{ $product->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-sm text-right space-x-2">
                                <a href="{{ route('admin.product.edit', $product) }}"
                                    class="text-blue-600 hover:text-blue-900" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.product.destroy', $product) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this product? This will also remove all gallery images.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-box-open text-gray-300 text-4xl mb-3"></i>
                                    <p class="text-gray-500 text-lg">No products found matching your criteria.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
