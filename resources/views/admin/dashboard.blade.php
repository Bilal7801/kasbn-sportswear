@extends('admin.layout')

@section('page-title', 'Dashboard | SportFit Admin')
@section('header-title', 'Sportswear Dashboard')

@section('content')
<div class="space-y-6">

    <div>
        <h1 class="text-2xl font-bold text-gray-900">Dashboard Overview</h1>
        <p class="text-gray-600 mt-1">Monitor inquiries, customers, products, and track business performance.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">📩 Total Inquiries</p>
                    <h2 class="text-2xl font-bold mt-2 text-gray-900">{{ $totalInquiriesToday ?? 0 }}</h2>
                    <div class="flex space-x-4 mt-2">
                        <div>
                            <p class="text-xs text-gray-500">Today</p>
                            <p class="text-sm font-semibold">{{ $totalInquiriesToday ?? 0 }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Week</p>
                            <p class="text-sm font-semibold">{{ $totalInquiriesWeek ?? 0 }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Month</p>
                            <p class="text-sm font-semibold">{{ $totalInquiriesMonth ?? 0 }}</p>
                        </div>
                    </div>
                </div>
                <div class="text-primary text-2xl">
                    <i class="fas fa-inbox"></i>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">🆕 New Inquiries</p>
                    <h2 class="text-2xl font-bold mt-2 text-gray-900">{{ $newInquiriesCount ?? 0 }}</h2>
                    <p class="text-xs text-blue-600 mt-2"><i class="fas fa-exclamation-circle mr-1"></i> Requires attention</p>
                </div>
                <div class="text-red-500 text-2xl">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">👤 Total Customers</p>
                    <h2 class="text-2xl font-bold mt-2 text-gray-900">{{ $totalCustomers ?? 0 }}</h2>
                    <p class="text-xs text-green-600 mt-2"><i class="fas fa-users mr-1"></i> Active customers</p>
                </div>
                <div class="text-green-500 text-2xl">
                    <i class="fas fa-user-friends"></i>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">📦 Total Products</p>
                    <h2 class="text-2xl font-bold mt-2 text-gray-900">{{ $totalProducts ?? 0 }}</h2>
                    <p class="text-xs text-purple-600 mt-2"><i class="fas fa-box mr-1"></i> Active listings</p>
                </div>
                <div class="text-purple-500 text-2xl">
                    <i class="fas fa-tshirt"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">⏳ Pending</p>
                    <h2 class="text-2xl font-bold mt-2 text-yellow-600">{{ $pendingInquiries ?? 0 }}</h2>
                </div>
                <div class="text-yellow-500 text-2xl"><i class="fas fa-clock"></i></div>
            </div>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">✅ Replied</p>
                    <h2 class="text-2xl font-bold mt-2 text-blue-600">{{ $repliedInquiries ?? 0 }}</h2>
                </div>
                <div class="text-blue-500 text-2xl"><i class="fas fa-reply"></i></div>
            </div>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">🔒 Closed</p>
                    <h2 class="text-2xl font-bold mt-2 text-green-600">{{ $closedInquiries ?? 0 }}</h2>
                </div>
                <div class="text-green-500 text-2xl"><i class="fas fa-check-circle"></i></div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">📊 Inquiries Per Day (Last 7 Days)</h3>
                </div>
                <div class="h-64">
                    <canvas id="inquiriesChart"></canvas>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">🏷 Product-wise Inquiry Count</h3>
                <div class="h-64">
                    <canvas id="productInquiriesChart"></canvas>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">🌍 Top Countries</h3>
                <div class="h-64">
                    <canvas id="countriesChart"></canvas>
                </div>
                <div class="mt-4 space-y-3">
                    @forelse($topCountries ?? [] as $country)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full bg-blue-500 mr-2"></div>
                            <span class="text-sm text-gray-700">{{ $country['name'] }}</span>
                        </div>
                        <span class="text-sm font-medium">{{ $country['count'] }}</span>
                    </div>
                    @empty
                    <p class="text-xs text-gray-400 text-center italic">No country data available</p>
                    @endforelse
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">🕒 Recent Activity</h3>
                <div class="space-y-4">
                    @forelse($recentActivity ?? [] as $activity)
                    <div class="flex items-start">
                        <div class="text-{{ $activity->status == 'new' ? 'blue' : 'green' }}-500 mt-1 mr-3">
                            <i class="fas fa-{{ $activity->status == 'new' ? 'envelope' : 'check-circle' }}"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">
                                {{ ucfirst($activity->status) }} inquiry from {{ $activity->name }}
                            </p>
                            <p class="text-xs text-gray-500">{{ $activity->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="text-sm text-gray-500">No recent activity found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // 1. Dynamic Data from Laravel Controller
        const daysLabels = {!! json_encode($days ?? []) !!};
        const inquiryData = {!! json_encode($inquiryCounts ?? []) !!};

        // We use collect() to prevent null errors if the variable is empty
        const productLabels = {!! json_encode(collect($productStats ?? [])->pluck('product_category')) !!};
        const productData = {!! json_encode(collect($productStats ?? [])->pluck('total')) !!};

        const countryLabels = {!! json_encode(collect($topCountries ?? [])->pluck('name')) !!};
        const countryData = {!! json_encode(collect($topCountries ?? [])->pluck('count')) !!};

        // 2. Line Chart (Inquiries Per Day)
        new Chart(document.getElementById('inquiriesChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: daysLabels,
                datasets: [{
                    label: 'Inquiries',
                    data: inquiryData,
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });

        // 3. Bar Chart (Product-wise)
        new Chart(document.getElementById('productInquiriesChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: productLabels,
                datasets: [{
                    data: productData,
                    backgroundColor: 'rgba(59, 130, 246, 0.8)'
                }]
            },
            options: { 
                responsive: true, 
                maintainAspectRatio: false, 
                plugins: { legend: { display: false } } 
            }
        });

        // 4. Doughnut Chart (Top Countries)
        new Chart(document.getElementById('countriesChart').getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: countryLabels,
                datasets: [{
                    data: countryData,
                    // Added enough colors to support top 5 countries
                    backgroundColor: ['#3b82f6', '#10b981', '#8b5cf6', '#94a3b8', '#f59e0b']
                }]
            },
            options: { responsive: true, maintainAspectRatio: false, cutout: '70%' }
        });
    });
</script>
@endpush