@extends('admin.layout')

@section('page-title', 'Enquiries - Sportswear Management')
@section('header-title', 'Sportswear Enquiries')

@section('content')
    <!-- Header with Stats -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Customer Enquiries</h2>
                <p class="text-gray-600 mt-1">Manage and respond to customer inquiries and messages</p>
            </div>
            <button class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg shadow-sm hover:bg-gray-50 transition flex items-center">
                <i class="fas fa-download mr-2"></i> Export CSV
            </button>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6">
            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-blue-100 text-blue-600 mr-4">
                        <i class="fas fa-envelope text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Total Enquiries</p>
                        <h3 class="text-xl font-bold text-gray-900">{{ number_format($totalEnquiries) }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-yellow-100 text-yellow-600 mr-4">
                        <i class="fas fa-clock text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Pending Response</p>
                        <h3 class="text-xl font-bold text-gray-900">{{ $pendingCount }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-green-100 text-green-600 mr-4">
                        <i class="fas fa-check-double text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Resolved Today</p>
                        <h3 class="text-xl font-bold text-gray-900">{{ $resolvedToday }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-purple-100 text-purple-600 mr-4">
                        <i class="fas fa-star text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Avg. Response Time</p>
                        <h3 class="text-xl font-bold text-gray-900">4.2h</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters and Search -->
    <form method="GET" action="{{ route('admin.enquires.index') }}">
        <div class="bg-white border border-gray-200 rounded-lg p-4 mb-6 shadow-sm">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <!-- Search Bar -->
                <div class="relative flex-1">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" name="search"
                           value="{{ request('search') }}"
                           placeholder="Search enquiries by name, email, or product..."
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <!-- Filter Buttons -->
                <div class="flex flex-wrap gap-2">
                    <select name="status" onchange="this.form.submit()"
                            class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="all">All Status</option>
                        <option value="new"         {{ request('status') == 'new'         ? 'selected' : '' }}>New</option>
                        <option value="reviewing"   {{ request('status') == 'reviewing'   ? 'selected' : '' }}>Reviewing</option>
                        <option value="replied"     {{ request('status') == 'replied'     ? 'selected' : '' }}>Replied</option>
                        <option value="negotiating" {{ request('status') == 'negotiating' ? 'selected' : '' }}>Negotiating</option>
                        <option value="resolved"    {{ request('status') == 'resolved'    ? 'selected' : '' }}>Resolved</option>
                        <option value="closed"      {{ request('status') == 'closed'      ? 'selected' : '' }}>Closed</option>
                    </select>

                    <select name="enquiry_type" onchange="this.form.submit()"
                            class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="all">All Types</option>
                        <option value="bulk_order"       {{ request('enquiry_type') == 'bulk_order'       ? 'selected' : '' }}>Bulk Order</option>
                        <option value="custom_branding"  {{ request('enquiry_type') == 'custom_branding'  ? 'selected' : '' }}>Custom Branding</option>
                        <option value="pricing"          {{ request('enquiry_type') == 'pricing'          ? 'selected' : '' }}>Pricing</option>
                        <option value="export"           {{ request('enquiry_type') == 'export'           ? 'selected' : '' }}>International Export</option>
                    </select>

                    <select name="sort" onchange="this.form.submit()"
                            class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Sort by: Newest</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Sort by: Oldest</option>
                        <option value="name"   {{ request('sort') == 'name'   ? 'selected' : '' }}>Sort by: Customer Name</option>
                    </select>

                    <!-- Search Submit -->
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">
                        <i class="fas fa-search mr-1"></i> Search
                    </button>
                </div>
            </div>
        </div>
    </form>

    <!-- Enquiries Table -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="font-semibold text-gray-900">All Enquiries</h3>
            <div class="flex items-center space-x-2">
                <span class="text-sm text-gray-500">{{ $enquiries->total() }} items</span>
                <a href="{{ route('admin.enquires.index') }}"
                   class="p-2 hover:bg-gray-100 rounded-lg transition">
                    <i class="fas fa-redo text-gray-500"></i>
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2">Customer</span>
                            </div>
                        </th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Enquiry Details</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Country</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">

                    @forelse ($enquiries as $enquiry)
                    <tr class="hover:bg-gray-50 transition">

                        {{-- Customer --}}
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <div class="ml-4 flex items-center">
                                    <div class="h-10 w-10 shrink-0 mr-3 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-600 text-sm">
                                        {{ strtoupper(substr($enquiry->name, 0, 1)) }}{{ strtoupper(substr(strstr($enquiry->name, ' '), 1, 1)) }}
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $enquiry->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $enquiry->email }}</div>
                                        @if($enquiry->phone)
                                            <div class="text-xs text-gray-400">{{ $enquiry->phone }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>

                        {{-- Enquiry Details --}}
                        <td class="py-4 px-6">
                            <div class="text-sm font-medium text-gray-900">
                                {{ ucwords(str_replace('_', ' ', $enquiry->enquiry_type)) }}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{ Str::limit($enquiry->message, 60) }}
                            </div>
                            @if($enquiry->product_category)
                                <div class="text-xs text-blue-600 mt-1">
                                    <i class="fas fa-tshirt mr-1"></i>
                                    {{ ucwords(str_replace('_', ' ', $enquiry->product_category)) }}
                                    @if($enquiry->quantity)
                                        &nbsp;· Qty: {{ $enquiry->quantity }}
                                    @endif
                                </div>
                            @endif
                        </td>

                        {{-- Country --}}
                        <td class="py-4 px-6">
                            <div class="text-sm font-medium text-gray-900">{{ $enquiry->country }}</div>
                            <div class="text-xs text-gray-400">{{ $enquiry->city ?? '—' }}</div>
                            <div class="text-xs text-gray-400">{{ $enquiry->device ?? '—' }}</div>
                        </td>

                        {{-- Date --}}
                        <td class="py-4 px-6">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $enquiry->created_at->format('M d, Y') }}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{ $enquiry->created_at->format('h:i A') }}
                            </div>
                        </td>

                        {{-- Status --}}
                        <td class="py-4 px-6">
                            @php
                                $statusColors = [
                                    'new'         => 'bg-red-100 text-red-800',
                                    'reviewing'   => 'bg-blue-100 text-blue-800',
                                    'replied'     => 'bg-indigo-100 text-indigo-800',
                                    'negotiating' => 'bg-yellow-100 text-yellow-800',
                                    'resolved'    => 'bg-green-100 text-green-800',
                                    'closed'      => 'bg-gray-100 text-gray-800',
                                ];
                                $color = $statusColors[$enquiry->status] ?? 'bg-gray-100 text-gray-800';
                            @endphp
                            <select onchange="updateStatus({{ $enquiry->id }}, this.value)"
                                    class="text-xs font-medium px-2 py-1 rounded-full border-0 {{ $color }} cursor-pointer focus:ring-2 focus:ring-blue-500">
                                <option value="new"         {{ $enquiry->status == 'new'         ? 'selected' : '' }}>New</option>
                                <option value="reviewing"   {{ $enquiry->status == 'reviewing'   ? 'selected' : '' }}>Reviewing</option>
                                <option value="replied"     {{ $enquiry->status == 'replied'     ? 'selected' : '' }}>Replied</option>
                                <option value="negotiating" {{ $enquiry->status == 'negotiating' ? 'selected' : '' }}>Negotiating</option>
                                <option value="resolved"    {{ $enquiry->status == 'resolved'    ? 'selected' : '' }}>Resolved</option>
                                <option value="closed"      {{ $enquiry->status == 'closed'      ? 'selected' : '' }}>Closed</option>
                            </select>
                        </td>

                        {{-- Actions --}}
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-900 p-1 rounded hover:bg-blue-50 transition" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-green-600 hover:text-green-900 p-1 rounded hover:bg-green-50 transition" title="Reply">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button onclick="deleteEnquiry({{ $enquiry->id }})"
                                        class="text-red-600 hover:text-red-900 p-1 rounded hover:bg-red-50 transition" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-12 text-center text-gray-400">
                            <i class="fas fa-inbox text-4xl mb-3 block"></i>
                            No enquiries found.
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <!-- Table Footer with Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Showing <span class="font-medium">{{ $enquiries->firstItem() }}</span>
                to <span class="font-medium">{{ $enquiries->lastItem() }}</span>
                of <span class="font-medium">{{ $enquiries->total() }}</span> enquiries
            </div>
            <div class="flex items-center space-x-1">
                {{-- Previous --}}
                @if ($enquiries->onFirstPage())
                    <span class="px-3 py-1 border border-gray-200 rounded-lg text-sm text-gray-400 cursor-not-allowed">Previous</span>
                @else
                    <a href="{{ $enquiries->previousPageUrl() }}"
                       class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition">Previous</a>
                @endif

                {{-- Page Numbers --}}
                @foreach ($enquiries->getUrlRange(1, $enquiries->lastPage()) as $page => $url)
                    @if ($page == $enquiries->currentPage())
                        <span class="px-3 py-1 bg-blue-600 text-white rounded-lg text-sm">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}"
                           class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition">{{ $page }}</a>
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($enquiries->hasMorePages())
                    <a href="{{ $enquiries->nextPageUrl() }}"
                       class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition">Next</a>
                @else
                    <span class="px-3 py-1 border border-gray-200 rounded-lg text-sm text-gray-400 cursor-not-allowed">Next</span>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
            <h4 class="font-medium text-gray-900 mb-2">Bulk Actions</h4>
            <div class="flex flex-wrap gap-2">
                <button class="px-3 py-1 bg-blue-100 text-blue-700 text-sm rounded-lg hover:bg-blue-200 transition">
                    <i class="fas fa-reply-all mr-1"></i> Reply All
                </button>
                <button class="px-3 py-1 bg-green-100 text-green-700 text-sm rounded-lg hover:bg-green-200 transition">
                    <i class="fas fa-check-circle mr-1"></i> Mark as Resolved
                </button>
                <button class="px-3 py-1 bg-red-100 text-red-700 text-sm rounded-lg hover:bg-red-200 transition">
                    <i class="fas fa-trash mr-1"></i> Delete Selected
                </button>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
            <h4 class="font-medium text-gray-900 mb-2">Export Options</h4>
            <div class="flex flex-wrap gap-2">
                <button class="px-3 py-1 border border-gray-300 text-gray-700 text-sm rounded-lg hover:bg-gray-50 transition">
                    <i class="fas fa-file-excel mr-1"></i> Excel
                </button>
                <button class="px-3 py-1 border border-gray-300 text-gray-700 text-sm rounded-lg hover:bg-gray-50 transition">
                    <i class="fas fa-file-csv mr-1"></i> CSV
                </button>
                <button class="px-3 py-1 border border-gray-300 text-gray-700 text-sm rounded-lg hover:bg-gray-50 transition">
                    <i class="fas fa-file-pdf mr-1"></i> PDF Report
                </button>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
            <h4 class="font-medium text-gray-900 mb-2">Response Insights</h4>
            <div class="space-y-2">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Pending replies</span>
                    <span class="text-sm font-medium text-yellow-600">{{ $pendingCount }} enquiries</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Avg response time</span>
                    <span class="text-sm font-medium text-green-600">4.2 hours</span>
                </div>
                <button class="w-full mt-2 text-sm text-blue-600 hover:text-blue-800 hover:underline">
                    View response analytics →
                </button>
            </div>
        </div>
    </div>

    {{-- Toast Notification --}}
    <div id="toast" class="hidden fixed bottom-6 right-6 px-5 py-3 rounded-lg shadow-lg text-white text-sm font-medium z-50"></div>

@endsection

@push('scripts')
<script>
    // ── Update Status via AJAX ──────────────────────────
    function updateStatus(id, status) {
        fetch(`/admin/enquiries/${id}/status`, {
            method: 'PATCH',
            headers: {
                'Content-Type'  : 'application/json',
                'X-CSRF-TOKEN'  : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept'        : 'application/json',
            },
            body: JSON.stringify({ status }),
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) showToast('✅ ' + data.message, 'green');
            else              showToast('❌ Failed to update status.', 'red');
        })
        .catch(() => showToast('❌ Something went wrong.', 'red'));
    }

    // ── Delete Enquiry via AJAX ─────────────────────────
    function deleteEnquiry(id) {
        if (!confirm('Are you sure you want to delete this enquiry?')) return;

        fetch(`/admin/enquiries/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept'       : 'application/json',
            },
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showToast('✅ ' + data.message, 'green');
                setTimeout(() => location.reload(), 1000);
            } else {
                showToast('❌ Failed to delete.', 'red');
            }
        })
        .catch(() => showToast('❌ Something went wrong.', 'red'));
    }

    // ── Toast Helper ────────────────────────────────────
    function showToast(message, color) {
        const toast = document.getElementById('toast');
        toast.textContent  = message;
        toast.className    = `fixed bottom-6 right-6 px-5 py-3 rounded-lg shadow-lg text-white text-sm font-medium z-50 bg-${color}-600`;
        toast.classList.remove('hidden');
        setTimeout(() => toast.classList.add('hidden'), 3000);
    }
</script>
@endpush