@extends('admin.layout')

@section('page-title', 'Categories - Sportswear Management')
@section('header-title', 'Sportswear Categories')

@if (session('success'))
    <div id="alert-success"
        class="mb-4 flex items-center p-4 text-green-800 rounded-lg bg-green-50 border border-green-200 shadow-sm"
        role="alert">
        <i class="fas fa-check-circle mr-2"></i>
        <div class="text-sm font-medium">
            {{ session('success') }}
        </div>
        <button type="button" class="ml-auto text-green-500 hover:text-green-700"
            onclick="document.getElementById('alert-success').remove()">
            <i class="fas fa-times"></i>
        </button>
    </div>
@endif

@section('content')
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Sportswear Categories</h2>
                <p class="text-gray-600 mt-1">Organize and manage your sportswear categories</p>
            </div>
            <a href="{{ route('admin.category.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-sm transition flex items-center">
                <i class="fas fa-plus mr-2"></i> Add New Category
            </a>
        </div>

        {{-- Statistics Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6 mb-6">
            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-blue-100 text-blue-600 mr-4">
                        <i class="fas fa-layer-group text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Total Categories</p>
                        <h3 class="text-xl font-bold text-gray-900">{{ $stats['total'] }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-green-100 text-green-600 mr-4">
                        <i class="fas fa-check-circle text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Active Categories</p>
                        <h3 class="text-xl font-bold text-gray-900">{{ $stats['active'] }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-purple-100 text-purple-600 mr-4">
                        <i class="fas fa-cube text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Total Products</p>
                        <h3 class="text-xl font-bold text-gray-900">{{ number_format($stats['total_products']) }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-yellow-100 text-yellow-600 mr-4">
                        <i class="fas fa-plus-circle text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">New This Month</p>
                        <h3 class="text-xl font-bold text-gray-900">{{ $stats['new_this_month'] }}</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Filter Form --}}
        <form action="{{ route('admin.category.index') }}" method="GET"
            class="bg-white border border-gray-200 rounded-lg p-4 mb-6 shadow-sm">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="relative flex-1">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search categories..."
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex flex-wrap gap-2">
                    <select name="status" onchange="this.form.submit()"
                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach (['All Status', 'Active', 'Inactive'] as $status)
                            <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                                {{ $status }}</option>
                        @endforeach
                    </select>

                    <select name="sort" onchange="this.form.submit()"
                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="Sort by Name" {{ request('sort') == 'Sort by Name' ? 'selected' : '' }}>Sort by Name
                        </option>
                        <option value="Sort by Products" {{ request('sort') == 'Sort by Products' ? 'selected' : '' }}>Sort
                            by Products</option>
                        <option value="Sort by Date" {{ request('sort') == 'Sort by Date' ? 'selected' : '' }}>Sort by Date
                        </option>
                    </select>

                    <button type="submit"
                        class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-sm hover:bg-gray-200 transition">
                        Filter
                    </button>
                </div>
            </div>
        </form>
    </div>

    {{-- Categories Table --}}
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden mt-6">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="font-semibold text-gray-900">All Categories</h3>
            <span class="text-sm text-gray-500">{{ $categories->total() }} total categories</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase">Products</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase">Last Updated</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($categories as $category)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div
                                        class="h-10 w-10 shrink-0 mr-3 rounded-lg bg-gray-100 flex items-center justify-center border border-gray-200 overflow-hidden">
                                        @if ($category->image)
                                            <img src="{{ asset('storage/' . $category->image) }}"
                                                class="h-full w-full object-cover">
                                        @else
                                            <i class="{{ $category->icon ?? 'fas fa-folder' }} text-gray-400"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $category->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $category->parent->name ?? 'Top Level' }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-600">
                                {{ Str::limit($category->description, 50) ?: 'No description' }}
                            </td>
                            <td class="py-4 px-6">
                                <div class="text-sm font-medium text-gray-900">{{ $category->products_count ?? 0 }}</div>
                                <div class="w-24 bg-gray-200 rounded-full h-1.5 mt-1">
                                    <div class="bg-blue-500 h-1.5 rounded-full"
                                        style="width: {{ min((($category->products_count ?? 0) / 100) * 100, 100) }}%">
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span
                                    class="px-2.5 py-0.5 rounded-full text-xs font-medium {{ $category->status ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $category->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500">
                                {{ $category->updated_at->diffForHumans() }}
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('admin.category.show', $category) }}"
                                    class="text-blue-600 hover:text-blue-900"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.category.edit', $category) }}"
                                    class="text-green-600 hover:text-green-900"><i class="fas fa-edit"></i></a>

                                {{-- Corrected Delete Form --}}
                                <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Warning: Deleting this category will also remove its associated image. Are you sure?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-red-600 hover:text-red-900 transition p-2">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-gray-500">No categories found matching your
                                criteria.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $categories->links() }}
        </div>
    </div>

    {{-- Insights --}}
    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
            <h4 class="font-medium text-gray-900 mb-2">Category Insights</h4>
            <div class="space-y-2">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Most products</span>
                    <span class="text-sm font-medium text-blue-600">
                        {{ $stats['most_products']->name ?? 'N/A' }}
                        ({{ $stats['most_products']->products_count ?? 0 }})
                    </span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Recently updated</span>
                    <span class="text-sm font-medium text-green-600">
                        {{ $stats['recently_updated']->name ?? 'N/A' }}
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
