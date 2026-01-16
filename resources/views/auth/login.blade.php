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
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }
        
        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15);
        }
        
        .login-card {
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
    <div class="login-card w-full max-w-md bg-gradient-to-br from-dark-secondary to-dark-primary rounded-2xl overflow-hidden border border-dark-accent relative">
        <div class="glow-effect"></div>
        
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
            
            <!-- Login Form -->
            <form id="loginForm" class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                        <i class="fas fa-envelope mr-2"></i>Email Address
                    </label>
                    <div class="relative">
                        <input 
                            type="email" 
                            id="email" 
                            required
                            placeholder="admin@example.com"
                            class="w-full px-4 py-3 pl-10 bg-dark-primary border border-dark-accent rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-blue-accent form-input transition duration-200">
                        <div class="absolute left-3 top-3.5 text-gray-500">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-sm font-medium text-gray-300">
                            <i class="fas fa-key mr-2"></i>Password
                        </label>
                        <a href="#" class="text-sm text-blue-light hover:text-blue-accent transition duration-200">Forgot password?</a>
                    </div>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="password" 
                            required
                            placeholder="••••••••"
                            class="w-full px-4 py-3 pl-10 bg-dark-primary border border-dark-accent rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-blue-accent form-input transition duration-200">
                        <div class="absolute left-3 top-3.5 text-gray-500">
                            <i class="fas fa-lock"></i>
                        </div>
                        <button type="button" id="togglePassword" class="absolute right-3 top-3.5 text-gray-500 hover:text-gray-300">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <input 
                        type="checkbox" 
                        id="remember"
                        class="h-4 w-4 text-blue-accent bg-dark-primary border-dark-accent rounded focus:ring-blue-accent focus:ring-offset-dark-primary">
                    <label for="remember" class="ml-2 text-sm text-gray-400">Remember me for 30 days</label>
                </div>
                
                <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-blue-accent to-blue-dark hover:from-blue-dark hover:to-blue-accent text-white font-medium rounded-lg transition duration-300 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-blue-accent focus:ring-opacity-50">
                    <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                </button>
            </form>
            
            <!-- Divider -->
            <div class="mt-8 mb-6 flex items-center">
                <div class="flex-grow border-t border-dark-accent"></div>
                <div class="mx-4 text-gray-500 text-sm">Or continue with</div>
                <div class="flex-grow border-t border-dark-accent"></div>
            </div>
            
            <!-- Social Login -->
            <div class="grid grid-cols-2 gap-3">
                <button type="button" class="py-2.5 px-4 bg-dark-primary border border-dark-accent text-gray-300 rounded-lg hover:bg-dark-accent transition duration-200 flex items-center justify-center">
                    <i class="fab fa-google mr-2"></i> Google
                </button>
                <button type="button" class="py-2.5 px-4 bg-dark-primary border border-dark-accent text-gray-300 rounded-lg hover:bg-dark-accent transition duration-200 flex items-center justify-center">
                    <i class="fab fa-microsoft mr-2"></i> Microsoft
                </button>
            </div>
            
            <!-- Footer -->
            <div class="mt-8 pt-6 border-t border-dark-accent text-center">
                <p class="text-gray-500 text-sm">
                    Don't have an account?
                    <a href="{{route('register')}}" class="text-blue-light hover:text-blue-accent font-medium ml-1 transition duration-200">Register</a>
                </p>
                <p class="text-gray-600 text-xs mt-3">
                    © {{ date('Y') }} Admin Portal. All rights reserved.
                </p>
            </div>
        </div>
    </div>
    
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
        
        // Form submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            // Simple validation
            if (!email || !password) {
                alert('Please fill in all fields');
                return;
            }
            
            // In a real application, you would send this to a server
            console.log('Login attempt:', { email, password });
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Signing In...';
            submitBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Reset button
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                
                // Show success message
                alert('Login successful! Redirecting to admin dashboard...');
                // In a real app, you would redirect: window.location.href = '/dashboard';
            }, 1500);
        });
        
        // Add subtle hover effect to card
        const loginCard = document.querySelector('.login-card');
        loginCard.addEventListener('mouseenter', () => {
            loginCard.style.transform = 'translateY(-4px)';
        });
        
        loginCard.addEventListener('mouseleave', () => {
            loginCard.style.transform = 'translateY(0)';
        });
    </script>
</body>
</html>