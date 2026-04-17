<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal · Light & Grey</title>

    <!-- Tailwind + Font Awesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom config: light grey palette, clean accents -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Light grey + soft blue combination
                        'brand-gray': {
                            50: '#f9fafb',
                            100: '#f3f4f6',
                            200: '#e5e7eb',
                            300: '#d1d5db',
                            400: '#9ca3af',
                            500: '#6b7280',
                            600: '#4b5563',
                            700: '#374151',
                            800: '#1f2937',
                            900: '#111827',
                        },
                        'brand-blue': {
                            light: '#e0f2fe',
                            DEFAULT: '#3b82f6',
                            deep: '#2563eb',
                            dark: '#1d4ed8',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f1f5f9; /* soft grey base */
            background-image: radial-gradient(circle at 10% 20%, rgba(226, 232, 240, 0.6) 0%, transparent 30%),
                              radial-gradient(circle at 90% 70%, rgba(203, 213, 225, 0.4) 0%, transparent 40%);
        }
        /* smooth card shadow — modern admin vibe */
        .login-card {
            box-shadow: 0 20px 35px -8px rgba(0, 0, 0, 0.07), 0 8px 18px -6px rgba(0, 0, 0, 0.05);
            backdrop-filter: blur(2px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        /* subtle input transition */
        input, button {
            transition: all 0.18s ease;
        }
        /* custom focus ring — light grey theme */
        .focus-ring-brand:focus {
            ring: 2px solid #3b82f6;
            border-color: transparent;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4 antialiased">

<!-- Main card: light grey & white, clean borders -->
<div class="login-card w-full max-w-md bg-white/90 backdrop-blur-sm rounded-2xl border border-brand-gray-200 shadow-xl">

    <div class="p-8">

        <!-- ===== HEADER : refined, light ===== -->
        <div class="text-center mb-8">
            <!-- Icon container — soft blue circle -->
            <div class="flex justify-center mb-5">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-brand-blue-light to-blue-100 flex items-center justify-center shadow-sm border border-brand-gray-200">
                    <i class="fas fa-shield-alt text-brand-blue-deep text-3xl"></i>
                </div>
            </div>
            <h1 class="text-3xl font-semibold text-brand-gray-800 tracking-tight">Admin Portal</h1>
            <p class="text-brand-gray-500 mt-1.5 text-sm font-medium">Sign in with your credentials</p>
        </div>

        <!-- ===== ERROR (light version) ===== -->
        @if ($errors->any())
            <div class="mb-5 bg-red-50 text-red-700 p-3.5 rounded-xl text-sm border border-red-200 flex items-start gap-2">
                <i class="fas fa-circle-exclamation mt-0.5 text-red-500"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <!-- ===== LOGIN FORM ===== -->
        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-5">
            @csrf

            <!-- Email Field -->
            <div>
                <label class="block text-sm font-medium text-brand-gray-700 mb-1.5">
                    <i class="fas fa-envelope mr-2 text-brand-gray-500 text-xs"></i>Email address
                </label>
                <div class="relative">
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full px-4 py-3 pl-11 bg-brand-gray-50 border border-brand-gray-300 rounded-xl text-brand-gray-800 placeholder:text-brand-gray-400 focus:outline-none focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/20 transition">
                    <div class="absolute left-3.5 top-3.5 text-brand-gray-500">
                        <i class="fas fa-user-circle"></i>
                    </div>
                </div>
            </div>

            <!-- Password Field -->
            <div>
                <label class="block text-sm font-medium text-brand-gray-700 mb-1.5">
                    <i class="fas fa-key mr-2 text-brand-gray-500 text-xs"></i>Password
                </label>
                <div class="relative">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        class="w-full px-4 py-3 pl-11 pr-11 bg-brand-gray-50 border border-brand-gray-300 rounded-xl text-brand-gray-800 placeholder:text-brand-gray-400 focus:outline-none focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/20 transition">
                    <div class="absolute left-3.5 top-3.5 text-brand-gray-500">
                        <i class="fas fa-lock"></i>
                    </div>
                    <button type="button" id="togglePassword" class="absolute right-3.5 top-3.5 text-brand-gray-500 hover:text-brand-gray-700 transition-colors">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <!-- Row: Remember + Forgot (inline) — modern admin style -->
            <div class="flex items-center justify-between pt-1">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" 
                           class="h-4 w-4 rounded border-brand-gray-300 text-brand-blue focus:ring-brand-blue/30 transition">
                    <label for="remember" class="ml-2 text-sm text-brand-gray-600 select-none">Remember me</label>
                </div>
                <!-- Forgot link (if needed, keep existing route) -->
                <a href="{{ route('admin.forget.password') }}" class="text-sm font-medium text-brand-gray-600 hover:text-brand-blue transition">
                    Forgot?
                </a>
            </div>

            <!-- Submit button — solid blue, matches grey/light theme -->
            <button type="submit"
                class="w-full py-3.5 mt-2 bg-gradient-to-r from-brand-blue to-brand-blue-deep text-white font-semibold rounded-xl shadow-md hover:shadow-lg hover:from-brand-blue-deep hover:to-brand-blue-dark transition-all duration-200 flex items-center justify-center gap-2">
                <i class="fas fa-arrow-right-to-bracket"></i>
                <span>Sign in to dashboard</span>
            </button>
        </form>

        <!-- ===== FOOTER ===== -->
        <div class="mt-8 pt-5 border-t border-brand-gray-200 text-center">
            <p class="text-brand-gray-500 text-sm">
                <i class="far fa-life-ring mr-1"></i> 
                <a href="{{ route('admin.forget.password') }}" class="text-brand-blue font-medium hover:underline">Reset password</a>
            </p>
            <div class="flex items-center justify-center gap-3 mt-4 text-brand-gray-400 text-xs">
                <span>© {{ date('Y') }} Admin Portal</span>
                <span class="w-1 h-1 bg-brand-gray-300 rounded-full"></span>
                <span><i class="far fa-clock mr-1"></i>Secure login</span>
            </div>
        </div>
    </div> <!-- end padding -->
</div> <!-- end card -->

<!-- Toggle password script (unchanged logic, updated style) -->
<script>
    (function() {
        const toggleBtn = document.getElementById('togglePassword');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', function (e) {
                e.preventDefault();
                const input = document.getElementById('password');
                const icon = this.querySelector('i');
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });
        }
    })();
</script>

<!-- small polish: auto-focus on email (if desired) -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const emailInput = document.querySelector('input[name="email"]');
        if (emailInput && !emailInput.value) {
            emailInput.focus();
        }
    });
</script>

</body>
</html>