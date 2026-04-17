@extends('admin.layout')

@section('page-title', 'Customers')
@section('header-title', 'Customer Management')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900 mb-2">Customer Management</h1>
    <p class="text-gray-600">Monitor and manage all customer information in one place.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
        <p class="text-sm text-gray-500">Total Customers</p>
        <h2 class="text-2xl font-bold mt-2 text-gray-900">{{ $totalCustomers }}</h2>
        <p class="text-xs text-gray-400 mt-2">Registered users</p>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
        <p class="text-sm text-gray-500">Active Customers</p>
        <h2 class="text-2xl font-bold mt-2 text-green-600">{{ $activeCustomers }}</h2>
        <p class="text-xs text-green-600 mt-2"><i class="fas fa-envelope mr-1"></i> Sent enquiries</p>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
        <p class="text-sm text-gray-500">Non-Active</p>
        <h2 class="text-2xl font-bold mt-2 text-orange-500">{{ $nonActiveCustomers }}</h2>
        <p class="text-xs text-orange-600 mt-2"><i class="fas fa-user-clock mr-1"></i> No enquiries yet</p>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
        <p class="text-sm text-gray-500">New This Month</p>
        <h2 class="text-2xl font-bold mt-2 text-purple-900">
            {{ \App\Models\User::whereMonth('created_at', now()->month)->count() }}
        </h2>
        <p class="text-xs text-purple-600 mt-2"><i class="fas fa-chart-line mr-1"></i> Recent signups</p>
    </div>
</div>

<div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm mb-6">
    <form action="{{ route('admin.customers.index') }}" method="GET" class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="relative flex-1">
            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search customers by name or email..."
                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>
        <div class="flex gap-3">
            <select name="status" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none">
                <option value="">All Status</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Non-Active</option>
            </select>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Filter
            </button>
        </div>
    </form>
</div>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900">Customer List</h3>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50">
                <tr class="border-b border-gray-200">
                    <th class="py-3 px-6 text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="py-3 px-6 text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                    <th class="py-3 px-6 text-xs font-medium text-gray-500 uppercase tracking-wider">Contact Info</th>
                    <th class="py-3 px-6 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Enquiries</th>
                    <th class="py-3 px-6 text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="py-3 px-6 text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse($customers as $customer)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-6 text-gray-900 font-medium">{{ ($customers->currentPage()-1) * $customers->perPage() + $loop->iteration }}</td>
                    <td class="py-4 px-6">
                        <div class="flex items-center">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($customer->name) }}&background=random&color=fff"
                                class="w-10 h-10 rounded-full mr-3 border">
                            <div>
                                <div class="font-bold text-gray-900">{{ $customer->name }}</div>
                                <div class="text-xs text-gray-500">Joined: {{ $customer->created_at->format('M d, Y') }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        <div class="text-gray-900 text-sm"><i class="far fa-envelope mr-1 text-gray-400"></i> {{ $customer->email }}</div>
                        <div class="text-xs text-gray-500"><i class="fas fa-phone mr-1 text-gray-400"></i> {{ $customer->phone ?? 'Not provided' }}</div>
                    </td>
                    <td class="py-4 px-6 text-center">
                        <span class="inline-block px-3 py-1 bg-blue-50 text-blue-700 rounded-lg font-bold text-sm">
                            {{ $customer->enquiries_count }}
                        </span>
                    </td>
                    <td class="py-4 px-6">
                        @if($customer->enquiries_count > 0)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-800 border border-green-200">
                                <i class="fas fa-check-circle mr-1"></i> ACTIVE
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-gray-100 text-gray-500 border border-gray-200">
                                <i class="fas fa-minus-circle mr-1"></i> NON-ACTIVE
                            </span>
                        @endif
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.customers.show', $customer->id) }}" class="text-blue-600 hover:bg-blue-100 p-2 rounded-lg transition" title="View Enquiries">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Delete this customer profile?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:bg-red-100 p-2 rounded-lg transition" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-10 text-center text-gray-500 italic">No customers found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
        {{ $customers->appends(request()->query())->links() }}
    </div>
</div>
@endsection