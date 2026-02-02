<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-primary': '#1a202c',
                        'dark-secondary': '#2d3748',
                        'dark-accent': '#4a5568',
                        'blue-accent': '#4299e1',
                        'blue-light': '#63b3ed',
                        'blue-dark': '#3182ce',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }
        .login-card {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">

<div class="login-card w-full max-w-md bg-gradient-to-br from-dark-secondary to-dark-primary rounded-2xl border border-dark-accent">

    <div class="p-8">

        <!-- Header -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <div class="w-14 h-14 rounded-full bg-gradient-to-r from-blue-accent to-blue-light flex items-center justify-center">
                    <i class="fas fa-lock text-white text-2xl"></i>
                </div>
            </div>
            <h1 class="text-2xl font-bold text-white">Admin Portal</h1>
            <p class="text-gray-400 mt-2">Sign in to access the dashboard</p>
        </div>

        <!-- Errors -->
        @if ($errors->any())
            <div class="mb-4 bg-red-500/10 text-red-400 p-3 rounded-lg text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm text-gray-300 mb-2">
                    <i class="fas fa-envelope mr-2"></i>Email
                </label>
                <div class="relative">
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full px-4 py-3 pl-10 bg-dark-primary border border-dark-accent rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-blue-accent">
                    <div class="absolute left-3 top-3.5 text-gray-500">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm text-gray-300 mb-2">
                    <i class="fas fa-key mr-2"></i>Password
                </label>
                <div class="relative">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        class="w-full px-4 py-3 pl-10 bg-dark-primary border border-dark-accent rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-blue-accent">
                    <div class="absolute left-3 top-3.5 text-gray-500">
                        <i class="fas fa-lock"></i>
                    </div>
                    <button type="button" id="togglePassword" class="absolute right-3 top-3.5 text-gray-500">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <!-- Remember -->
            <div class="flex items-center">
                <input type="checkbox" name="remember" class="h-4 w-4 text-blue-accent rounded">
                <label class="ml-2 text-sm text-gray-400">Remember me</label>
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full py-3 bg-gradient-to-r from-blue-accent to-blue-dark text-white font-semibold rounded-lg hover:opacity-90 transition">
                <i class="fas fa-sign-in-alt mr-2"></i>Sign In
            </button>
        </form>

        <!-- Footer -->
        <div class="mt-8 pt-6 border-t border-dark-accent text-center">
            <p class="text-gray-500 text-sm">
                Forgot your password?
                <a href="{{ route('admin.forget.password') }}" class="text-blue-light">Forget Password</a>
            </p>
            <p class="text-gray-600 text-xs mt-3">
                © {{ date('Y') }} Admin Portal
            </p>
        </div>

    </div>
</div>

<!-- JS -->
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
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
</script>

</body>
</html>
