@php
    $admin = Auth::guard('admin')->user();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="robots" content="noindex, nofollow, noarchive, nosnippet">
    <meta name="googlebot" content="noindex, nofollow">

    <title>@yield('page-title', 'SportFit Admin')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        primaryHover: '#2563eb',
                        secondary: '#10b981',
                        lightGray: '#f8fafc',
                        borderGray: '#e2e8f0',
                        textGray: '#64748b'
                    }
                }
            }
        }
    </script>
    @stack('styles')
</head>

<body class="bg-gray-50 text-gray-800 min-h-screen">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-white border-r border-gray-200 hidden md:block">
            <div class="p-6 text-xl font-bold text-gray-900 flex items-center">
                <i class="fas fa-running text-primary mr-3"></i> SportFit Admin
            </div>

            <nav class="mt-6 space-y-1 px-4">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-primary text-white' : 'hover:bg-gray-100' }}">
                    <i class="fas fa-chart-line mr-3"></i> Dashboard
                </a>

                <a href="{{ route('admin.customers.index') }}"
                    class="flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.customers.index') ? 'bg-primary text-white' : 'hover:bg-gray-100' }}">
                    <i class="fas fa-users mr-3"></i> Customers
                </a>

                <div x-data="{ open: {{ (request()->is('admin/category*') || request()->is('admin/product*')) ? 'true' : 'false' }} }" class="relative">
                    <button @click="open = !open"
                        class="w-full flex items-center px-4 py-3 rounded-lg transition-colors focus:outline-none 
                        {{ (request()->is('admin/category*') || request()->is('admin/product*')) ? 'bg-primary text-white' : 'hover:bg-gray-100' }}">

                        <i class="fas fa-tshirt mr-3 {{ (request()->is('admin/category*') || request()->is('admin/product*')) ? 'text-white' : '' }}"></i>
                        <span>Sportswear</span>
                        <i :class="{'fa-chevron-down': !open, 'fa-chevron-up': open}"
                            class="fas ml-auto text-xs {{ (request()->is('admin/category*') || request()->is('admin/product*')) ? 'text-white' : '' }}"></i>
                    </button>

                    <div x-show="open" x-transition class="mt-1 ml-4 border-l-2 border-gray-200 pl-2 space-y-1" style="display: none;">
                        <a href="{{ route('admin.category.index') }}"
                            class="flex items-center px-4 py-2 rounded-lg text-sm {{ request()->is('admin/category*') ? 'text-primary font-bold' : 'text-gray-600 hover:bg-gray-100' }}">
                            Category
                        </a>
                        <a href="{{ route('admin.product.index') }}"
                            class="flex items-center px-4 py-2 rounded-lg text-sm {{ request()->is('admin/product*') ? 'text-primary font-bold' : 'text-gray-600 hover:bg-gray-100' }}">
                            Product
                        </a>
                    </div>
                </div>

                <a href="{{ route('admin.enquires.index') }}"
                    class="flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.enquires.index') ? 'bg-primary text-white' : 'hover:bg-gray-100' }}">
                    <i class="fas fa-envelope-open-text mr-3"></i>
                    <span>Enquiries</span>
                    @if(isset($newInquiriesCount) && $newInquiriesCount > 0)
                    <span class="ml-auto {{ request()->routeIs('admin.enquires.index') ? 'bg-white text-primary' : 'bg-red-500 text-white' }} text-[10px] font-bold px-2 py-0.5 rounded-full">
                        {{ $newInquiriesCount }}
                    </span>
                    @endif
                </a>

                <a href="{{ route('admin.inbox') }}"
                    class="flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.inbox') ? 'bg-primary text-white' : 'hover:bg-gray-100' }}">
                    <i class="fas fa-inbox mr-3"></i>
                    <span>Inbox</span>
                    <span class="ml-auto bg-gray-200 text-gray-700 text-[10px] font-bold px-2 py-0.5 rounded-full group-hover:bg-white">
                        Gmail
                    </span>
                </a>

                <hr class="my-4 border-gray-100">

                <a href="{{ route('admin.settings') }}"
                    class="flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('admin.settings') ? 'bg-primary text-white' : 'hover:bg-gray-100' }}">
                    <i class="fas fa-cog mr-3"></i>
                    <span>Settings</span>
                </a>

                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 text-red-600">
                        <i class="fas fa-sign-out-alt mr-3"></i> Logout
                    </button>
                </form>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col">
            <header class="bg-white border-b border-gray-200 p-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold text-gray-900">@yield('header-title')</h1>

                <div class="flex items-center space-x-4">
                    <button class="relative text-gray-600 hover:text-primary transition-colors">
                        <i class="fas fa-bell text-lg"></i>
                        @if(isset($newInquiriesCount) && $newInquiriesCount > 0)
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-4 h-4 rounded-full flex items-center justify-center">
                            {{ $newInquiriesCount }}
                        </span>
                        @endif
                    </button>
                    
                    <a href="{{ route('admin.settings') }}" class="flex items-center border-l pl-4 border-gray-200 hover:opacity-80 transition-all group">
                        <img
                            src="{{ ($admin && $admin->profile_image)
                                ? asset('uploads/admin/'.$admin->profile_image)
                                : 'https://ui-avatars.com/api/?name='.urlencode($admin?->name ?? 'Admin').'&background=3b82f6&color=fff' }}"
                            class="w-9 h-9 rounded-full mr-2 ring-2 ring-transparent group-hover:ring-primary/20 transition-all"
                            alt="Admin Avatar">
                        <div class="flex flex-col">
                            <span class="text-sm font-bold leading-tight group-hover:text-primary transition-colors">
                                {{ $admin?->name ?? 'Admin' }}
                            </span>
                            <span class="text-xs text-gray-500">SportFit Manager</span>
                        </div>
                        <i class="fas fa-cog ml-3 text-gray-300 group-hover:text-primary text-xs transition-colors"></i>
                    </a>
                </div>
            </header>

            <main class="p-6 bg-gray-50 flex-1">
                @yield('content')
            </main>

            <footer class="bg-white border-t border-gray-200 p-4 text-center text-sm text-gray-600">
                &copy; {{ date('Y') }} SportFit Admin Dashboard. All rights reserved.
            </footer>
        </div>
    </div>

    @stack('scripts')
</body>

</html>