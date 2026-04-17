@extends('admin.layout')

@section('page-title', 'Mailbox - Sportswear Management')

@section('content')
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Mailbox</h2>
                <p class="text-gray-600 mt-1">Manage customer emails and communications</p>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6">
            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-blue-100 text-blue-600 mr-4">
                        <i class="fas fa-inbox text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Primary</p>
                        <h3 class="text-xl font-bold text-gray-900">42</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-green-100 text-green-600 mr-4">
                        <i class="fas fa-users text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Social</p>
                        <h3 class="text-xl font-bold text-gray-900">18</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-yellow-100 text-yellow-600 mr-4">
                        <i class="fas fa-tag text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Promotions</p>
                        <h3 class="text-xl font-bold text-gray-900">86</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-purple-100 text-purple-600 mr-4">
                        <i class="fas fa-info-circle text-lg"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Updates</p>
                        <h3 class="text-xl font-bold text-gray-900">24</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Mailbox Container -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden" style="height: calc(100vh - 240px);">
        <div class="flex h-full">
            <!-- Left Sidebar (Gmail Style) -->
            <div class="w-64 border-r border-gray-200 flex flex-col">
                <!-- Compose Button -->
                <div class="p-4">
                    <button onclick="openCompose()" class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 px-4 rounded-lg hover:shadow-lg transition-all flex items-center justify-center font-medium shadow-md">
                        <i class="fas fa-pen mr-3"></i> Compose
                    </button>
                </div>

                <!-- Mail Categories -->
                <div class="flex-1 px-2 overflow-y-auto">
                    <div class="space-y-0.5">
                        <a href="#" class="flex items-center px-3 py-3 text-sm text-gray-700 hover:bg-gray-100 rounded-r-full rounded-l-none transition">
                            <div class="w-8 mr-3 flex items-center justify-center">
                                <i class="fas fa-inbox text-gray-500"></i>
                            </div>
                            <span>Inbox</span>
                            <span class="ml-auto bg-blue-500 text-white text-xs px-2 py-0.5 rounded-full">12</span>
                        </a>
                        <a href="#" class="flex items-center px-3 py-3 text-sm text-gray-700 hover:bg-gray-100 rounded-r-full rounded-l-none transition">
                            <div class="w-8 mr-3 flex items-center justify-center">
                                <i class="fas fa-star text-gray-500"></i>
                            </div>
                            <span>Starred</span>
                        </a>
                        <a href="#" class="flex items-center px-3 py-3 text-sm text-gray-700 hover:bg-gray-100 rounded-r-full rounded-l-none transition">
                            <div class="w-8 mr-3 flex items-center justify-center">
                                <i class="fas fa-clock text-gray-500"></i>
                            </div>
                            <span>Snoozed</span>
                        </a>
                        <a href="#" class="flex items-center px-3 py-3 text-sm text-gray-700 hover:bg-gray-100 rounded-r-full rounded-l-none transition">
                            <div class="w-8 mr-3 flex items-center justify-center">
                                <i class="fas fa-paper-plane text-gray-500"></i>
                            </div>
                            <span>Sent</span>
                        </a>
                        <a href="#" class="flex items-center px-3 py-3 text-sm text-gray-700 hover:bg-gray-100 rounded-r-full rounded-l-none transition">
                            <div class="w-8 mr-3 flex items-center justify-center">
                                <i class="fas fa-file-alt text-gray-500"></i>
                            </div>
                            <span>Drafts</span>
                            <span class="ml-auto bg-gray-500 text-white text-xs px-2 py-0.5 rounded-full">3</span>
                        </a>
                        <a href="#" class="flex items-center px-3 py-3 text-sm text-gray-700 hover:bg-gray-100 rounded-r-full rounded-l-none transition">
                            <div class="w-8 mr-3 flex items-center justify-center">
                                <i class="fas fa-chevron-down text-gray-500"></i>
                            </div>
                            <span>More</span>
                        </a>
                    </div>

                    <!-- Labels Section -->
                    <div class="mt-8 px-3">
                        <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Labels</h3>
                        <div class="space-y-0.5">
                            <a href="#" class="flex items-center px-2 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded transition">
                                <div class="w-3 h-3 rounded-full bg-blue-500 mr-3"></div>
                                <span>Personal</span>
                            </a>
                            <a href="#" class="flex items-center px-2 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded transition">
                                <div class="w-3 h-3 rounded-full bg-green-500 mr-3"></div>
                                <span>Work</span>
                            </a>
                            <a href="#" class="flex items-center px-2 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded transition">
                                <div class="w-3 h-3 rounded-full bg-yellow-500 mr-3"></div>
                                <span>Important</span>
                            </a>
                            <a href="#" class="flex items-center px-2 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded transition">
                                <div class="w-3 h-3 rounded-full bg-purple-500 mr-3"></div>
                                <span>Travel</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Bottom Apps -->
                <div class="p-4 border-t border-gray-200">
                    <div class="flex items-center justify-center space-x-4 text-gray-500">
                        <button class="p-2 hover:bg-gray-100 rounded-full transition">
                            <i class="fas fa-calendar"></i>
                        </button>
                        <button class="p-2 hover:bg-gray-100 rounded-full transition">
                            <i class="fas fa-address-book"></i>
                        </button>
                        <button class="p-2 hover:bg-gray-100 rounded-full transition">
                            <i class="fas fa-tasks"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Main Email Area -->
            <div class="flex-1 flex flex-col">
                <!-- Top Search Bar (Gmail Style) -->
                <div class="p-3 border-b border-gray-200 bg-gray-50 flex items-center">
                    <!-- Hamburger Menu (Mobile) -->
                    <button class="p-2 text-gray-600 hover:bg-gray-200 rounded-full mr-2 lg:hidden">
                        <i class="fas fa-bars"></i>
                    </button>

                    <!-- Search Bar -->
                    <div class="relative flex-1 max-w-2xl">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" 
                               placeholder="Search in emails" 
                               class="w-full pl-10 pr-10 py-2.5 bg-white border border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <button class="text-gray-400 hover:text-gray-600 p-1">
                                <i class="fas fa-sliders-h"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Right Actions -->
                    <div class="ml-4 flex items-center space-x-2">
                        <button class="p-2 text-gray-600 hover:bg-gray-200 rounded-full relative">
                            <i class="fas fa-question-circle"></i>
                        </button>
                        <button class="p-2 text-gray-600 hover:bg-gray-200 rounded-full relative">
                            <i class="fas fa-cog"></i>
                        </button>
                        <button class="p-2 text-gray-600 hover:bg-gray-200 rounded-full relative">
                            <i class="fas fa-th"></i>
                        </button>
                        <div class="relative">
                            <img src="https://ui-avatars.com/api/?name=Admin&background=3b82f6&color=fff" 
                                 class="w-8 h-8 rounded-full cursor-pointer">
                        </div>
                    </div>
                </div>

                <!-- Email Action Bar -->
                <div class="px-4 py-2 border-b border-gray-200 bg-white flex items-center">
                    <!-- Select All Checkbox -->
                    <div class="flex items-center mr-4">
                        <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <button class="p-2 text-gray-500 hover:text-gray-700 ml-2">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center space-x-1">
                        <button class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded">
                            <i class="fas fa-redo"></i>
                        </button>
                        <button class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded">
                            <i class="fas fa-exclamation-circle"></i>
                        </button>
                        <button class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded">
                            <i class="fas fa-trash"></i>
                        </button>
                        <button class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded">
                            <i class="fas fa-envelope"></i>
                        </button>
                        <button class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded">
                            <i class="fas fa-tag"></i>
                        </button>
                        <button class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </div>

                    <!-- Pagination & View -->
                    <div class="ml-auto flex items-center text-sm text-gray-500">
                        <span class="mr-4">1-50 of 1,284</span>
                        <button class="p-2 hover:bg-gray-100 rounded">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="p-2 hover:bg-gray-100 rounded">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Email List -->
                <div class="flex-1 overflow-y-auto">
                    <!-- Email Row - Unread -->
                    <div class="flex items-center px-4 py-3 border-b border-gray-100 hover:bg-gray-50 cursor-pointer bg-gray-50">
                        <div class="flex items-center w-12">
                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <div class="ml-3">
                                <i class="fas fa-star text-yellow-400 hover:text-yellow-500 cursor-pointer"></i>
                            </div>
                        </div>
                        <div class="flex-1 flex items-center min-w-0">
                            <div class="w-48 flex-shrink-0">
                                <span class="font-semibold text-gray-900">Google Cloud</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center">
                                    <span class="font-semibold text-gray-900 truncate mr-2">
                                        API Access Confirmation - SportFit Dashboard
                                    </span>
                                    <span class="text-xs bg-blue-100 text-blue-800 px-1.5 py-0.5 rounded">Inbox</span>
                                </div>
                                <p class="text-sm text-gray-600 truncate mt-0.5">
                                    Your SportFit Gmail API key has been successfully generated for email integration...
                                </p>
                            </div>
                            <div class="w-20 flex-shrink-0 text-right">
                                <span class="text-xs text-gray-500">12:45 PM</span>
                                <div class="mt-1">
                                    <i class="fas fa-paperclip text-gray-400 text-xs"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Email Row - Read -->
                    <div class="flex items-center px-4 py-3 border-b border-gray-100 hover:bg-gray-50 cursor-pointer">
                        <div class="flex items-center w-12">
                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <div class="ml-3">
                                <i class="far fa-star text-gray-300 hover:text-yellow-500 cursor-pointer"></i>
                            </div>
                        </div>
                        <div class="flex-1 flex items-center min-w-0">
                            <div class="w-48 flex-shrink-0">
                                <span class="font-medium text-gray-700">Nike Partnership Team</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center">
                                    <span class="text-gray-900 truncate mr-2">
                                        Spring 2026 Sportswear Catalog - Review Required
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600 truncate mt-0.5">
                                    Please review the attached PDF for our upcoming sportswear collection launch...
                                </p>
                            </div>
                            <div class="w-20 flex-shrink-0 text-right">
                                <span class="text-xs text-gray-500">Yesterday</span>
                                <div class="mt-1">
                                    <i class="fas fa-paperclip text-gray-400 text-xs"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Email Row - Important -->
                    <div class="flex items-center px-4 py-3 border-b border-gray-100 hover:bg-gray-50 cursor-pointer">
                        <div class="flex items-center w-12">
                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <div class="ml-3">
                                <i class="fas fa-star text-yellow-400"></i>
                            </div>
                        </div>
                        <div class="flex-1 flex items-center min-w-0">
                            <div class="w-48 flex-shrink-0">
                                <span class="font-medium text-gray-700">Alice Smith</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center">
                                    <span class="text-gray-900 truncate mr-2">
                                        Order #ORD-7892 Shipping Update Request
                                    </span>
                                    <span class="text-xs bg-red-100 text-red-800 px-1.5 py-0.5 rounded">Important</span>
                                </div>
                                <p class="text-sm text-gray-600 truncate mt-0.5">
                                    Hello, could you provide an update on my yoga mat order #ORD-7892?
                                </p>
                            </div>
                            <div class="w-20 flex-shrink-0 text-right">
                                <span class="text-xs text-gray-500">Feb 05</span>
                            </div>
                        </div>
                    </div>

                    <!-- Email Row - Promotion -->
                    <div class="flex items-center px-4 py-3 border-b border-gray-100 hover:bg-gray-50 cursor-pointer">
                        <div class="flex items-center w-12">
                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <div class="ml-3">
                                <i class="far fa-star text-gray-300 hover:text-yellow-500 cursor-pointer"></i>
                            </div>
                        </div>
                        <div class="flex-1 flex items-center min-w-0">
                            <div class="w-48 flex-shrink-0">
                                <span class="font-medium text-gray-700">Adidas Marketing</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center">
                                    <span class="text-gray-900 truncate mr-2">
                                        Collaboration Proposal for Running Shoes Collection
                                    </span>
                                    <span class="text-xs bg-green-100 text-green-800 px-1.5 py-0.5 rounded">Promotion</span>
                                </div>
                                <p class="text-sm text-gray-600 truncate mt-0.5">
                                    We would like to propose a collaboration for our upcoming running shoes collection...
                                </p>
                            </div>
                            <div class="w-20 flex-shrink-0 text-right">
                                <span class="text-xs text-gray-500">Feb 03</span>
                            </div>
                        </div>
                    </div>

                    <!-- Email Row - Social -->
                    <div class="flex items-center px-4 py-3 border-b border-gray-100 hover:bg-gray-50 cursor-pointer">
                        <div class="flex items-center w-12">
                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <div class="ml-3">
                                <i class="far fa-star text-gray-300 hover:text-yellow-500 cursor-pointer"></i>
                            </div>
                        </div>
                        <div class="flex-1 flex items-center min-w-0">
                            <div class="w-48 flex-shrink-0">
                                <span class="font-medium text-gray-700">LinkedIn</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center">
                                    <span class="text-gray-900 truncate mr-2">
                                        5 new connection requests in Sportswear Industry
                                    </span>
                                    <span class="text-xs bg-blue-100 text-blue-800 px-1.5 py-0.5 rounded">Social</span>
                                </div>
                                <p class="text-sm text-gray-600 truncate mt-0.5">
                                    Connect with industry professionals in the sportswear sector...
                                </p>
                            </div>
                            <div class="w-20 flex-shrink-0 text-right">
                                <span class="text-xs text-gray-500">Feb 02</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Panel - Quick Settings (Optional) -->
            <div class="w-16 border-l border-gray-200 hidden lg:flex flex-col items-center py-4">
                <div class="space-y-4">
                    <button class="p-3 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-full">
                        <i class="fas fa-calendar-alt"></i>
                    </button>
                    <button class="p-3 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-full">
                        <i class="fas fa-keep"></i>
                    </button>
                    <button class="p-3 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-full">
                        <i class="fas fa-tasks"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Gmail-Style Compose Window (Hidden by default) -->
    <div id="composeWindow" class="fixed bottom-0 right-4 w-[600px] bg-white rounded-t-lg shadow-2xl border border-gray-300 hidden" style="z-index: 1000; height: 600px;">
        <!-- Compose Header -->
        <div class="px-4 py-3 bg-gray-800 text-white rounded-t-lg flex justify-between items-center cursor-move" id="composeHeader">
            <span class="font-medium">New Message</span>
            <div class="flex items-center space-x-3">
                <button onclick="minimizeCompose()" class="text-gray-300 hover:text-white">
                    <i class="fas fa-minus"></i>
                </button>
                <button onclick="maximizeCompose()" class="text-gray-300 hover:text-white">
                    <i class="fas fa-expand"></i>
                </button>
                <button onclick="closeCompose()" class="text-gray-300 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <!-- Compose Body -->
        <div class="flex flex-col h-[calc(100%-48px)]">
            <!-- Recipient Fields -->
            <div class="border-b border-gray-200">
                <div class="px-4 py-3">
                    <input type="text" placeholder="To" class="w-full border-none focus:ring-0 text-sm px-0 placeholder-gray-500">
                </div>
                <div class="px-4 py-2 border-t border-gray-100 hidden" id="ccBccFields">
                    <input type="text" placeholder="Cc" class="w-full border-none focus:ring-0 text-sm px-0 placeholder-gray-500 mb-2">
                    <input type="text" placeholder="Bcc" class="w-full border-none focus:ring-0 text-sm px-0 placeholder-gray-500">
                </div>
                <div class="px-4 py-1 border-t border-gray-100">
                    <button onclick="toggleCcBcc()" class="text-xs text-blue-600 hover:text-blue-800">Cc, Bcc</button>
                </div>
            </div>

            <!-- Subject -->
            <div class="px-4 py-3 border-b border-gray-200">
                <input type="text" placeholder="Subject" class="w-full border-none focus:ring-0 text-sm px-0 placeholder-gray-500">
            </div>

            <!-- Email Editor -->
            <div class="flex-1 px-4 py-3">
                <div class="h-full">
                    <!-- Formatting Toolbar -->
                    <div class="flex items-center space-x-2 mb-3 pb-2 border-b border-gray-200">
                        <select class="text-xs border-none focus:ring-0">
                            <option>Arial</option>
                            <option>Helvetica</option>
                            <option>Times New Roman</option>
                        </select>
                        <select class="text-xs border-none focus:ring-0">
                            <option>12px</option>
                            <option>14px</option>
                            <option>16px</option>
                        </select>
                        <div class="flex items-center space-x-1">
                            <button class="p-1.5 hover:bg-gray-100 rounded">
                                <i class="fas fa-bold text-sm"></i>
                            </button>
                            <button class="p-1.5 hover:bg-gray-100 rounded">
                                <i class="fas fa-italic text-sm"></i>
                            </button>
                            <button class="p-1.5 hover:bg-gray-100 rounded">
                                <i class="fas fa-underline text-sm"></i>
                            </button>
                            <button class="p-1.5 hover:bg-gray-100 rounded">
                                <i class="fas fa-list-ul text-sm"></i>
                            </button>
                            <button class="p-1.5 hover:bg-gray-100 rounded">
                                <i class="fas fa-list-ol text-sm"></i>
                            </button>
                            <button class="p-1.5 hover:bg-gray-100 rounded">
                                <i class="fas fa-link text-sm"></i>
                            </button>
                            <button class="p-1.5 hover:bg-gray-100 rounded">
                                <i class="fas fa-smile text-sm"></i>
                            </button>
                            <button class="p-1.5 hover:bg-gray-100 rounded">
                                <i class="fas fa-image text-sm"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Message Body -->
                    <textarea 
                        id="messageBody"
                        placeholder="Compose email"
                        class="w-full h-[calc(100%-40px)] border-none focus:ring-0 text-sm resize-none px-0 placeholder-gray-500"
                        rows="15"
                    ></textarea>
                </div>
            </div>

            <!-- Compose Footer -->
            <div class="px-4 py-3 border-t border-gray-200 bg-gray-50 flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <button onclick="sendEmail()" class="px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 font-medium flex items-center">
                        <i class="fas fa-paper-plane mr-2"></i> Send
                    </button>
                    <button class="p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-200 rounded">
                        <i class="fas fa-paperclip"></i>
                    </button>
                    <button class="p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-200 rounded">
                        <i class="fas fa-image"></i>
                    </button>
                    <button class="p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-200 rounded">
                        <i class="fas fa-link"></i>
                    </button>
                    <button class="p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-200 rounded">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <button onclick="saveDraft()" class="text-sm text-gray-600 hover:text-gray-800">
                        <i class="far fa-save mr-1"></i> Save Draft
                    </button>
                    <button onclick="discardCompose()" class="text-sm text-gray-600 hover:text-gray-800 ml-4">
                        <i class="fas fa-trash-alt mr-1"></i> Discard
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Minimized Compose State -->
    <div id="minimizedCompose" class="fixed bottom-0 right-4 w-64 bg-gray-800 text-white rounded-t-lg cursor-pointer hidden" style="z-index: 999;" onclick="restoreCompose()">
        <div class="px-4 py-2 flex justify-between items-center">
            <span class="font-medium text-sm">New Message</span>
            <div class="flex items-center space-x-2">
                <button onclick="restoreCompose()" class="text-gray-300 hover:text-white">
                    <i class="fas fa-expand"></i>
                </button>
                <button onclick="closeCompose()" class="text-gray-300 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Full Screen Compose -->
    <div id="fullScreenCompose" class="fixed inset-0 bg-white z-[1001] hidden flex-col">
        <!-- Full Screen Header -->
        <div class="px-6 py-4 bg-gray-800 text-white flex justify-between items-center">
            <span class="font-medium">New Message</span>
            <div class="flex items-center space-x-4">
                <button onclick="saveDraft()" class="text-gray-300 hover:text-white text-sm">
                    <i class="far fa-save mr-1"></i> Save Draft
                </button>
                <button onclick="minimizeCompose()" class="text-gray-300 hover:text-white">
                    <i class="fas fa-minus"></i>
                </button>
                <button onclick="closeFullScreenCompose()" class="text-gray-300 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <!-- Full Screen Body -->
        <div class="flex-1 p-6">
            <div class="max-w-4xl mx-auto space-y-4">
                <div class="border-b border-gray-300 pb-3">
                    <input type="text" placeholder="To" class="w-full border-none focus:ring-0 text-lg px-0">
                </div>
                <div class="border-b border-gray-300 pb-3">
                    <input type="text" placeholder="Subject" class="w-full border-none focus:ring-0 text-lg px-0">
                </div>
                <div class="mt-4">
                    <textarea 
                        placeholder="Compose email"
                        class="w-full h-[400px] border-none focus:ring-0 text-lg resize-none px-0"
                    ></textarea>
                </div>
            </div>
        </div>

        <!-- Full Screen Footer -->
        <div class="px-6 py-4 border-t border-gray-300 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <button onclick="sendEmail()" class="px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium flex items-center">
                    <i class="fas fa-paper-plane mr-2"></i> Send
                </button>
                <button class="p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded">
                    <i class="fas fa-paperclip"></i>
                </button>
                <button class="p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded">
                    <i class="fas fa-image"></i>
                </button>
                <button class="p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded">
                    <i class="fas fa-link"></i>
                </button>
                <button class="p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
            </div>
            <button onclick="discardCompose()" class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                <i class="fas fa-trash-alt mr-2"></i> Discard
            </button>
        </div>
    </div>
@endsection

@push('styles')
<style>
/* Gmail-like scrollbar */
::-webkit-scrollbar {
    width: 16px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 8px;
    border: 4px solid #f1f1f1;
}

::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

/* Email row hover effect */
.email-row:hover {
    box-shadow: inset 1px 0 0 #dadce0, inset -1px 0 0 #dadce0, 0 1px 2px 0 rgba(60,64,67,.3), 0 1px 3px 1px rgba(60,64,67,.15);
}

/* Gmail-like transitions */
.gmail-transition {
    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
}
</style>
@endpush

@push('scripts')
<script>
let isComposeOpen = false;
let isComposeMinimized = false;
let isComposeFullScreen = false;
let isCcBccVisible = false;

function openCompose() {
    document.getElementById('composeWindow').classList.remove('hidden');
    document.getElementById('minimizedCompose').classList.add('hidden');
    document.getElementById('fullScreenCompose').classList.add('hidden');
    isComposeOpen = true;
    isComposeMinimized = false;
    isComposeFullScreen = false;
}

function minimizeCompose() {
    if (isComposeFullScreen) {
        closeFullScreenCompose();
        setTimeout(() => {
            document.getElementById('minimizedCompose').classList.remove('hidden');
            document.getElementById('composeWindow').classList.add('hidden');
        }, 50);
    } else {
        document.getElementById('minimizedCompose').classList.remove('hidden');
        document.getElementById('composeWindow').classList.add('hidden');
    }
    isComposeMinimized = true;
    isComposeOpen = false;
}

function restoreCompose() {
    document.getElementById('composeWindow').classList.remove('hidden');
    document.getElementById('minimizedCompose').classList.add('hidden');
    isComposeMinimized = false;
    isComposeOpen = true;
}

function maximizeCompose() {
    document.getElementById('fullScreenCompose').classList.remove('hidden');
    document.getElementById('composeWindow').classList.add('hidden');
    isComposeFullScreen = true;
    isComposeOpen = false;
}

function closeFullScreenCompose() {
    document.getElementById('fullScreenCompose').classList.add('hidden');
    document.getElementById('composeWindow').classList.remove('hidden');
    isComposeFullScreen = false;
    isComposeOpen = true;
}

function closeCompose() {
    if (confirm('Discard this message?')) {
        document.getElementById('composeWindow').classList.add('hidden');
        document.getElementById('minimizedCompose').classList.add('hidden');
        document.getElementById('fullScreenCompose').classList.add('hidden');
        isComposeOpen = false;
        isComposeMinimized = false;
        isComposeFullScreen = false;
    }
}

function toggleCcBcc() {
    const ccBccFields = document.getElementById('ccBccFields');
    if (isCcBccVisible) {
        ccBccFields.classList.add('hidden');
    } else {
        ccBccFields.classList.remove('hidden');
    }
    isCcBccVisible = !isCcBccVisible;
}

function sendEmail() {
    alert('Email sent successfully!');
    closeCompose();
}

function saveDraft() {
    alert('Draft saved successfully!');
}

function discardCompose() {
    closeCompose();
}

// Make compose window draggable
let isDragging = false;
let currentX;
let currentY;
let initialX;
let initialY;
let xOffset = 0;
let yOffset = 0;

const composeWindow = document.getElementById('composeWindow');
const composeHeader = document.getElementById('composeHeader');

if (composeHeader) {
    composeHeader.addEventListener('mousedown', dragStart);
    document.addEventListener('mousemove', drag);
    document.addEventListener('mouseup', dragEnd);
}

function dragStart(e) {
    initialX = e.clientX - xOffset;
    initialY = e.clientY - yOffset;

    if (e.target === composeHeader) {
        isDragging = true;
    }
}

function drag(e) {
    if (isDragging) {
        e.preventDefault();
        currentX = e.clientX - initialX;
        currentY = e.clientY - initialY;

        xOffset = currentX;
        yOffset = currentY;

        composeWindow.style.transform = `translate3d(${currentX}px, ${currentY}px, 0)`;
    }
}

function dragEnd(e) {
    initialX = currentX;
    initialY = currentY;
    isDragging = false;
}

// Auto-resize textarea in compose
const messageBody = document.getElementById('messageBody');
if (messageBody) {
    messageBody.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });
}

// Add keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Ctrl + N for new email
    if (e.ctrlKey && e.key === 'n') {
        e.preventDefault();
        openCompose();
    }
    
    // Escape to close compose
    if (e.key === 'Escape' && (isComposeOpen || isComposeFullScreen)) {
        closeCompose();
    }
});

// Star toggle functionality
document.querySelectorAll('.fa-star, .far.fa-star').forEach(star => {
    star.addEventListener('click', function(e) {
        e.stopPropagation();
        if (this.classList.contains('far')) {
            this.classList.remove('far');
            this.classList.add('fas', 'text-yellow-400');
        } else {
            this.classList.remove('fas', 'text-yellow-400');
            this.classList.add('far', 'text-gray-300');
        }
    });
});
</script>
@endpush