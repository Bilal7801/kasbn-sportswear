@extends('admin.layout')

@section('page-title', 'Customer Profile')
@section('header-title', 'Customer Details')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.customers.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to Customer List
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <div class="flex flex-col items-center text-center">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=128&background=3b82f6&color=fff" 
                         class="w-24 h-24 rounded-full border-4 border-gray-100 mb-4">
                    <h2 class="text-xl font-bold text-gray-900">{{ $user->name }}</h2>
                    <span class="mt-1 px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold uppercase">
                        {{ $user->enquiries->count() > 0 ? 'Active Customer' : 'Registered Only' }}
                    </span>
                </div>
                
                <div class="mt-8 space-y-4">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="far fa-envelope w-6"></i>
                        <span class="font-medium text-gray-900">{{ $user->email }}</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-phone w-6"></i>
                        <span>{{ $user->phone ?? 'No phone added' }}</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="far fa-calendar-alt w-6"></i>
                        <span>Joined: {{ $user->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Enquiry History</h3>
                </div>

                <div class="p-6">
                    @forelse($user->enquiries as $enquiry)
                        <div class="mb-6 last:mb-0 border-l-4 border-blue-500 bg-gray-50 p-4 rounded-r-lg">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-xs font-bold text-blue-600 uppercase tracking-wide">
                                    {{ $enquiry->enquiry_type ?? 'General Enquiry' }}
                                </span>
                                <span class="text-xs text-gray-500 italic">
                                    {{ $enquiry->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <p class="text-gray-800 text-sm leading-relaxed mb-3">
                                "{{ $enquiry->message }}"
                            </p>
                            <div class="flex gap-4 text-xs text-gray-500 border-t pt-2">
                                <span><i class="fas fa-layer-group mr-1"></i> {{ $enquiry->product_category }}</span>
                                <span><i class="fas fa-sort-numeric-up mr-1"></i> Qty: {{ $enquiry->quantity }}</span>
                                <span><i class="fas fa-globe-americas mr-1"></i> {{ $enquiry->country }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <i class="fas fa-inbox text-4xl text-gray-200 mb-4"></i>
                            <p class="text-gray-500 italic">This customer has not sent any enquiries yet.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection