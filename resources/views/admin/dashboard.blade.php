<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportswear Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
</head>

<body class="bg-gray-50 text-gray-800 min-h-screen">

<!-- ===== Layout Wrapper ===== -->
<div class="flex min-h-screen">

    <!-- ===== Sidebar ===== -->
    <aside class="w-64 bg-white border-r border-gray-200 hidden md:block">
        <div class="p-6 text-xl font-bold text-gray-900 flex items-center">
            <i class="fas fa-running text-primary mr-3"></i> SportFit Admin
        </div>

        <nav class="mt-6 space-y-1 px-4">
            <a href="#" class="flex items-center px-4 py-3 rounded-lg bg-primary text-white">
                <i class="fas fa-chart-line mr-3"></i> Dashboard
            </a>
            <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-100">
                <i class="fas fa-users mr-3"></i> Customers
            </a>
            <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-100">
                <i class="fas fa-tshirt mr-3"></i> Sportswear
            </a>
            <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-100">
                <i class="fas fa-shopping-cart mr-3"></i> Orders
            </a>
            <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-100">
                <i class="fas fa-chart-pie mr-3"></i> Analytics
            </a>
            <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-100">
                <i class="fas fa-cog mr-3"></i> Settings
            </a>
        </nav>
    </aside>

    <!-- ===== Main Content ===== -->
    <div class="flex-1 flex flex-col">

        <!-- ===== Topbar ===== -->
        <header class="bg-white border-b border-gray-200 p-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-900">Sportswear Dashboard</h1>

            <div class="flex items-center space-x-4">
                <button class="relative text-gray-600">
                    <i class="fas fa-bell text-lg"></i>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-4 h-4 rounded-full flex items-center justify-center">3</span>
                </button>

                <div class="flex items-center">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=3b82f6&color=fff" class="w-9 h-9 rounded-full mr-2">
                    <span class="text-sm font-medium">Admin</span>
                </div>
            </div>
        </header>

        <!-- ===== Dashboard Content ===== -->
        <main class="p-6 space-y-6">

            <!-- Header Section -->
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
                <p class="text-gray-600 mt-1">Plan, prioritize, and manage your sportswear business with ease.</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                    <p class="text-sm text-gray-500">Total Collections</p>
                    <h2 class="text-2xl font-bold mt-2 text-gray-900">24</h2>
                    <p class="text-xs text-green-600 mt-2"><i class="fas fa-arrow-up mr-1"></i> Increased from last month</p>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                    <p class="text-sm text-gray-500">Ended Collections</p>
                    <h2 class="text-2xl font-bold mt-2 text-gray-900">10</h2>
                    <p class="text-xs text-green-600 mt-2"><i class="fas fa-arrow-up mr-1"></i> Increased from last month</p>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                    <p class="text-sm text-gray-500">Running Collections</p>
                    <h2 class="text-2xl font-bold mt-2 text-gray-900">12</h2>
                    <p class="text-xs text-green-600 mt-2"><i class="fas fa-arrow-up mr-1"></i> Increased from last month</p>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                    <p class="text-sm text-gray-500">Pending Collection</p>
                    <h2 class="text-2xl font-bold mt-2 text-gray-900">2</h2>
                    <p class="text-xs text-blue-600 mt-2">In Discussion</p>
                </div>
            </div>

            <!-- Two Column Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Collection Analytics -->
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Collection Analytics</h3>
                        <div class="flex justify-between mb-6">
                            <span class="text-sm text-gray-500">S</span>
                            <span class="text-sm text-gray-500">M</span>
                            <span class="text-sm text-gray-500">T</span>
                            <span class="text-sm text-gray-500">W</span>
                            <span class="text-sm text-gray-500">T</span>
                            <span class="text-sm text-gray-500">F</span>
                            <span class="text-sm text-gray-500">S</span>
                        </div>
                        
                        <!-- Placeholder for chart bars -->
                        <div class="flex items-end justify-between h-32">
                            <div class="w-8 bg-blue-100 rounded-t"></div>
                            <div class="w-8 bg-blue-200 rounded-t"></div>
                            <div class="w-8 bg-blue-300 rounded-t"></div>
                            <div class="w-8 bg-blue-400 rounded-t"></div>
                            <div class="w-8 bg-blue-500 rounded-t"></div>
                            <div class="w-8 bg-blue-400 rounded-t"></div>
                            <div class="w-8 bg-blue-300 rounded-t"></div>
                        </div>
                    </div>

                    <!-- Team Collaboration -->
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Team Collaboration</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <h4 class="font-medium text-gray-900">Alexandra Deff</h4>
                                    <p class="text-sm text-gray-600">Working on New Running Shoe Design</p>
                                </div>
                                <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-800">Completed</span>
                            </div>
                            
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <h4 class="font-medium text-gray-900">Edwin Adenike</h4>
                                    <p class="text-sm text-gray-600">Working on Sportswear E-commerce Integration</p>
                                </div>
                                <span class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-800">In Progress</span>
                            </div>
                            
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <h4 class="font-medium text-gray-900">Isaac Oluwatemi</h4>
                                    <p class="text-sm text-gray-600">Working on Product Filter Functionality</p>
                                </div>
                                <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                            </div>
                            
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <h4 class="font-medium text-gray-900">David Oshodi</h4>
                                    <p class="text-sm text-gray-600">Working on Responsive Product Pages</p>
                                </div>
                                <span class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-800">In Progress</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Reminders -->
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Reminders</h3>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <h4 class="font-medium text-gray-900">Meeting with Fitness Pro Retail</h4>
                            <p class="text-sm text-gray-600 mt-1">Time: 02.00 pm - 04.00 pm</p>
                            <button class="mt-3 w-full bg-primary text-white py-2 rounded-lg hover:bg-primaryHover transition">
                                Start Meeting
                            </button>
                        </div>
                    </div>

                    <!-- Collection Progress -->
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Collection Progress</h3>
                        <div class="text-center mb-4">
                            <div class="inline-flex items-center justify-center w-32 h-32 rounded-full border-8 border-blue-500 border-t-blue-200" style="transform: rotate(45deg);">
                                <div class="text-center" style="transform: rotate(-45deg);">
                                    <span class="text-2xl font-bold text-gray-900">41%</span>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600 mt-4">Collection Ended</p>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
                                <span class="text-sm text-gray-600">Completed</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-blue-500 mr-2"></div>
                                <span class="text-sm text-gray-600">In Progress</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-yellow-500 mr-2"></div>
                                <span class="text-sm text-gray-600">Pending</span>
                            </div>
                        </div>
                    </div>

                    <!-- Collection Goals -->
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Collection Goals</h3>
                        <div class="space-y-4">
                            <div class="border-l-4 border-primary pl-3 py-1">
                                <h4 class="font-medium text-gray-900">Launch Spring Collection</h4>
                                <p class="text-sm text-gray-600">Due: Nov 26, 2024</p>
                            </div>
                            <div class="border-l-4 border-secondary pl-3 py-1">
                                <h4 class="font-medium text-gray-900">New Customer Onboarding</h4>
                                <p class="text-sm text-gray-600">Due: Nov 28, 2024</p>
                            </div>
                            <div class="border-l-4 border-purple-500 pl-3 py-1">
                                <h4 class="font-medium text-gray-900">Build Analytics Dashboard</h4>
                                <p class="text-sm text-gray-600">Due: Nov 30, 2024</p>
                            </div>
                            <div class="border-l-4 border-pink-500 pl-3 py-1">
                                <h4 class="font-medium text-gray-900">Optimize Website Load Time</h4>
                                <p class="text-sm text-gray-600">Due: Dec 5, 2024</p>
                            </div>
                            <div class="border-l-4 border-yellow-500 pl-3 py-1">
                                <h4 class="font-medium text-gray-900">Cross-Brand Testing</h4>
                                <p class="text-sm text-gray-600">Due: Dec 6, 2024</p>
                            </div>
                        </div>
                    </div>

                    <!-- Time Tracker -->
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Time Tracker</h3>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-gray-900">01:24:08</div>
                            <p class="text-sm text-gray-600 mt-2">Active work session</p>
                        </div>
                    </div>
                </div>
            </div>

        </main>

        <!-- ===== Footer ===== -->
        <footer class="bg-white border-t border-gray-200 p-4 text-center text-sm text-gray-600">
            © {{date('Y')}} SportFit Admin Dashboard. All rights reserved.
        </footer>

    </div>
</div>

</body>
</html>