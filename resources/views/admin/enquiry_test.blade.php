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
            <!-- Export Button -->
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
                        <h3 class="text-xl font-bold text-gray-900">1,284</h3>
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
                        <h3 class="text-xl font-bold text-gray-900">14</h3>
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
                        <h3 class="text-xl font-bold text-gray-900">42</h3>
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
    <div class="bg-white border border-gray-200 rounded-lg p-4 mb-6 shadow-sm">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <!-- Search Bar -->
            <div class="relative flex-1">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="text" 
                       placeholder="Search enquiries by name, email, or product..." 
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap gap-2">
                <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option>All Status</option>
                    <option>New</option>
                    <option>In Progress</option>
                    <option>Replied</option>
                    <option>Resolved</option>
                </select>

                <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option>All Types</option>
                    <option>Product Inquiry</option>
                    <option>Order Issue</option>
                    <option>Shipping</option>
                    <option>General</option>
                </select>

                <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option>Sort by: Newest</option>
                    <option>Sort by: Oldest</option>
                    <option>Sort by: Customer Name</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Enquiries Table -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="font-semibold text-gray-900">All Enquiries</h3>
            <div class="flex items-center space-x-2">
                <span class="text-sm text-gray-500">120 items</span>
                <button class="p-2 hover:bg-gray-100 rounded-lg transition">
                    <i class="fas fa-redo text-gray-500"></i>
                </button>
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
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Enquiry Details
                        </th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date & Time
                        </th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Priority
                        </th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <!-- Enquiry 1 -->
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <div class="ml-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 shrink-0 mr-3 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-600">
                                            JD
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">John Doe</div>
                                            <div class="text-sm text-gray-500">john.doe@example.com</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="text-sm font-medium text-gray-900">Bulk Order Inquiry</div>
                            <div class="text-sm text-gray-500">Requesting price list for 500 Running Shoes...</div>
                            <div class="text-xs text-blue-600 mt-1">
                                <i class="fas fa-tshirt mr-1"></i> Product: Pro Runner X1
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="text-sm font-medium text-gray-900">Feb 05, 2026</div>
                            <div class="text-sm text-gray-500">10:45 AM</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                <i class="fas fa-circle mr-1" style="font-size: 6px"></i>
                                New
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <i class="fas fa-exclamation-triangle mr-1"></i>
                                High
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-900 p-1 rounded hover:bg-blue-50 transition" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-green-600 hover:text-green-900 p-1 rounded hover:bg-green-50 transition" title="Reply">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button class="text-purple-600 hover:text-purple-900 p-1 rounded hover:bg-purple-50 transition" title="Assign">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-900 p-1 rounded hover:bg-red-50 transition" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Enquiry 2 -->
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <div class="ml-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 shrink-0 mr-3 rounded-full bg-green-100 flex items-center justify-center font-bold text-green-600">
                                            AS
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Alice Smith</div>
                                            <div class="text-sm text-gray-500">alice@web.com</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="text-sm font-medium text-gray-900">Shipping Delay Concern</div>
                            <div class="text-sm text-gray-500">When will my yoga mat be delivered?</div>
                            <div class="text-xs text-blue-600 mt-1">
                                <i class="fas fa-shipping-fast mr-1"></i> Order: #ORD-7892
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="text-sm font-medium text-gray-900">Feb 04, 2026</div>
                            <div class="text-sm text-gray-500">03:12 PM</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                <i class="fas fa-circle mr-1" style="font-size: 6px"></i>
                                Replied
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i>
                                Normal
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-900 p-1 rounded hover:bg-blue-50 transition" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-green-600 hover:text-green-900 p-1 rounded hover:bg-green-50 transition" title="Reply">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button class="text-purple-600 hover:text-purple-900 p-1 rounded hover:bg-purple-50 transition" title="Assign">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-900 p-1 rounded hover:bg-red-50 transition" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Enquiry 3 -->
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <div class="ml-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 shrink-0 mr-3 rounded-full bg-purple-100 flex items-center justify-center font-bold text-purple-600">
                                            RS
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Robert Johnson</div>
                                            <div class="text-sm text-gray-500">robert.j@fitness.com</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="text-sm font-medium text-gray-900">Custom Gym Equipment Quote</div>
                            <div class="text-sm text-gray-500">Need pricing for commercial gym setup...</div>
                            <div class="text-xs text-blue-600 mt-1">
                                <i class="fas fa-dumbbell mr-1"></i> Category: Gym Equipment
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="text-sm font-medium text-gray-900">Feb 03, 2026</div>
                            <div class="text-sm text-gray-500">11:30 AM</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <i class="fas fa-circle mr-1" style="font-size: 6px"></i>
                                In Progress
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <i class="fas fa-exclamation-triangle mr-1"></i>
                                High
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-900 p-1 rounded hover:bg-blue-50 transition" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-green-600 hover:text-green-900 p-1 rounded hover:bg-green-50 transition" title="Reply">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button class="text-purple-600 hover:text-purple-900 p-1 rounded hover:bg-purple-50 transition" title="Assign">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-900 p-1 rounded hover:bg-red-50 transition" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Enquiry 4 -->
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <div class="ml-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 shrink-0 mr-3 rounded-full bg-pink-100 flex items-center justify-center font-bold text-pink-600">
                                            MB
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Maria Brown</div>
                                            <div class="text-sm text-gray-500">maria@yogalife.com</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="text-sm font-medium text-gray-900">Product Return Request</div>
                            <div class="text-sm text-gray-500">Yoga pants size issue, need exchange...</div>
                            <div class="text-xs text-blue-600 mt-1">
                                <i class="fas fa-exchange-alt mr-1"></i> Order: #ORD-7821
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="text-sm font-medium text-gray-900">Feb 02, 2026</div>
                            <div class="text-sm text-gray-500">02:45 PM</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fas fa-circle mr-1" style="font-size: 6px"></i>
                                Resolved
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i>
                                Normal
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-900 p-1 rounded hover:bg-blue-50 transition" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-green-600 hover:text-green-900 p-1 rounded hover:bg-green-50 transition" title="Reply">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button class="text-purple-600 hover:text-purple-900 p-1 rounded hover:bg-purple-50 transition" title="Assign">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-900 p-1 rounded hover:bg-red-50 transition" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Table Footer -->
        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">120</span> enquiries
            </div>
            <div class="flex items-center space-x-2">
                <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition">
                    Previous
                </button>
                <button class="px-3 py-1 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700 transition">
                    1
                </button>
                <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition">
                    2
                </button>
                <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition">
                    3
                </button>
                <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 transition">
                    Next
                </button>
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
                    <span class="text-sm font-medium text-yellow-600">14 enquiries</span>
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
@endsection