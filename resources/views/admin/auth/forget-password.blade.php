<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
                        'green-accent': '#48bb78',
                        'green-light': '#68d391',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }

        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15);
        }

        .password-card {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3), 0 1px 3px rgba(0, 0, 0, 0.5);
        }

        .glow-effect {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #4299e1, transparent);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">
    <div class="password-card w-full max-w-md bg-gradient-to-br from-dark-secondary to-dark-primary rounded-2xl overflow-hidden border border-dark-accent relative">
        <div class="glow-effect"></div>

        <div class="p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <div class="w-14 h-14 rounded-full bg-gradient-to-r from-blue-accent to-blue-light flex items-center justify-center">
                        <i class="fas fa-envelope text-white text-2xl"></i>
                    </div>
                </div>
                <h1 class="text-2xl font-bold text-white">Forgot Your Password?</h1>
                <p class="text-gray-400 mt-2">Enter your email to receive a reset link</p>
            </div>

            <!-- Backend Messages -->
            @if (session('status'))
            <div class="bg-green-500 text-white text-center py-2 px-4 rounded mb-4">
                {{ session('status') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="bg-red-500 text-white text-center py-2 px-4 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Email Form -->
            <form class="space-y-5" method="POST" action="{{ route('admin.password.email') }}">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                        <i class="fas fa-envelope mr-2"></i>Email Address
                    </label>
                    <div class="relative">
                        <input type="email" id="email" name="email" required placeholder="admin@company.com"
                            class="w-full px-4 py-3 pl-10 bg-dark-primary border border-dark-accent rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-blue-accent form-input transition duration-200">
                        <div class="absolute left-3 top-3.5 text-gray-500">
                            <i class="fas fa-at"></i>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">We will send a password reset link to this email.</p>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3 px-4 bg-gradient-to-r from-blue-accent to-blue-light hover:from-blue-light hover:to-blue-accent text-white font-medium rounded-lg transition duration-300 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-blue-accent focus:ring-opacity-50 mt-4">
                    <i class="fas fa-paper-plane mr-2"></i>Send Reset Link
                </button>
            </form>

            <!-- Divider -->
            <div class="mt-8 mb-6 flex items-center">
                <div class="flex-grow border-t border-dark-accent"></div>
                <div class="mx-4 text-gray-500 text-sm">Remember your password?</div>
                <div class="flex-grow border-t border-dark-accent"></div>
            </div>

            <!-- Login Link -->
            <div class="text-center">
                <a href="{{ route('admin.login') }}"
                    class="inline-flex items-center py-2.5 px-6 bg-dark-primary border border-dark-accent text-gray-300 rounded-lg hover:bg-dark-accent transition duration-200">
                    <i class="fas fa-sign-in-alt mr-2"></i> Back to Sign In
                </a>
            </div>

            <!-- Footer -->
            <div class="mt-8 pt-6 border-t border-dark-accent text-center">
                <p class="text-gray-600 text-xs">
                    <i class="fas fa-shield-alt mr-1"></i> Your account is secure
                </p>
                <p class="text-gray-600 text-xs mt-3">
                    © {{ date('Y') }} Admin Portal. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</body>

</html>