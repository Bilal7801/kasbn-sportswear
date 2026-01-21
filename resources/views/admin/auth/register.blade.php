<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
        
        .register-card {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3), 0 1px 3px rgba(0, 0, 0, 0.5);
        }
        
        .glow-effect {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #48bb78, transparent);
        }
        
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="register-card w-full max-w-md bg-gradient-to-br from-dark-secondary to-dark-primary rounded-2xl overflow-hidden border border-dark-accent relative">
        <div class="glow-effect"></div>
        
        <div class="p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <div class="w-14 h-14 rounded-full bg-gradient-to-r from-green-accent to-green-light flex items-center justify-center">
                        <i class="fas fa-user-plus text-white text-2xl"></i>
                    </div>
                </div>
                <h1 class="text-2xl font-bold text-white">Create Admin Account</h1>
                <p class="text-gray-400 mt-2">Register for administrator access</p>
            </div>
            
            <!-- Registration Form -->
            <form id="registerForm" class="space-y-5">
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-2">
                        <i class="fas fa-user-circle mr-2"></i>Full Name
                    </label>
                    <div class="relative">
                        <input 
                            type="text" 
                            id="name" 
                            required
                            placeholder="John Smith"
                            class="w-full px-4 py-3 pl-10 bg-dark-primary border border-dark-accent rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-blue-accent form-input transition duration-200">
                        <div class="absolute left-3 top-3.5 text-gray-500">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Enter your full name as it appears on official documents</p>
                </div>
                
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                        <i class="fas fa-envelope mr-2"></i>Work Email Address
                    </label>
                    <div class="relative">
                        <input 
                            type="email" 
                            id="email" 
                            required
                            placeholder="admin@company.com"
                            class="w-full px-4 py-3 pl-10 bg-dark-primary border border-dark-accent rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-blue-accent form-input transition duration-200">
                        <div class="absolute left-3 top-3.5 text-gray-500">
                            <i class="fas fa-at"></i>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Use your organization email address</p>
                </div>
                
                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                        <i class="fas fa-key mr-2"></i>Create Password
                    </label>
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
                
                
                <!-- Confirm Password Field -->
                <div>
                    <label for="confirmPassword" class="block text-sm font-medium text-gray-300 mb-2">
                        <i class="fas fa-key mr-2"></i>Confirm Password
                    </label>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="confirmPassword" 
                            required
                            placeholder="••••••••"
                            class="w-full px-4 py-3 pl-10 bg-dark-primary border border-dark-accent rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-blue-accent form-input transition duration-200">
                        <div class="absolute left-3 top-3.5 text-gray-500">
                            <i class="fas fa-lock"></i>
                        </div>
                        <button type="button" id="toggleConfirmPassword" class="absolute right-3 top-3.5 text-gray-500 hover:text-gray-300">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div id="passwordMatch" class="mt-1 hidden">
                        <p class="text-xs text-green-accent"><i class="fas fa-check-circle mr-1"></i>Passwords match</p>
                    </div>
                    <div id="passwordMismatch" class="mt-1 hidden">
                        <p class="text-xs text-red-400"><i class="fas fa-times-circle mr-1"></i>Passwords do not match</p>
                    </div>
                </div>
                
                <!-- Terms and Conditions -->
                <div class="flex items-start mt-4">
                    <input 
                        type="checkbox" 
                        id="terms"
                        required
                        class="h-4 w-4 mt-1 text-blue-accent bg-dark-primary border-dark-accent rounded focus:ring-blue-accent focus:ring-offset-dark-primary">
                    <label for="terms" class="ml-2 text-sm text-gray-400">
                        I agree to the <a href="#" class="text-blue-light hover:text-blue-accent">Terms of Service</a> and <a href="#" class="text-blue-light hover:text-blue-accent">Privacy Policy</a>
                    </label>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-green-accent to-green-light hover:from-green-light hover:to-green-accent text-white font-medium rounded-lg transition duration-300 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-green-accent focus:ring-opacity-50 mt-4">
                    <i class="fas fa-user-plus mr-2"></i>Create Admin Account
                </button>
            </form>
            
            <!-- Divider -->
            <div class="mt-8 mb-6 flex items-center">
                <div class="flex-grow border-t border-dark-accent"></div>
                <div class="mx-4 text-gray-500 text-sm">Already registered?</div>
                <div class="flex-grow border-t border-dark-accent"></div>
            </div>
            
            <!-- Login Link -->
            <div class="text-center">
                <a href="{{route('login')}}" class="inline-flex items-center py-2.5 px-6 bg-dark-primary border border-dark-accent text-gray-300 rounded-lg hover:bg-dark-accent transition duration-200">
                    <i class="fas fa-sign-in-alt mr-2"></i> Sign In to Existing Account
                </a>
            </div>
            
            <!-- Footer -->
            <div class="mt-8 pt-6 border-t border-dark-accent text-center">
                <p class="text-gray-600 text-xs mt-3">
                    © {{date('Y')}} Admin Portal. All rights reserved.
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
        
        // Toggle confirm password visibility
        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const confirmPasswordInput = document.getElementById('confirmPassword');
            const icon = this.querySelector('i');
            
            if (confirmPasswordInput.type === 'password') {
                confirmPasswordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                confirmPasswordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
        
       
        
        // Check password match on confirm password input
        document.getElementById('confirmPassword').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            checkPasswordMatch(password, confirmPassword);
        });
        
        
        // Helper function to check if passwords match
        function checkPasswordMatch(password, confirmPassword) {
            const matchElement = document.getElementById('passwordMatch');
            const mismatchElement = document.getElementById('passwordMismatch');
            
            if (password && confirmPassword) {
                if (password === confirmPassword) {
                    matchElement.classList.remove('hidden');
                    mismatchElement.classList.add('hidden');
                } else {
                    matchElement.classList.add('hidden');
                    mismatchElement.classList.remove('hidden');
                }
            } else {
                matchElement.classList.add('hidden');
                mismatchElement.classList.add('hidden');
            }
        }
        
        // Form submission
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const terms = document.getElementById('terms').checked;
            
            // Validation
            if (!name || !email || !password || !confirmPassword) {
                alert('Please fill in all required fields');
                return;
            }
            
            if (!terms) {
                alert('You must agree to the Terms of Service and Privacy Policy');
                return;
            }
            
            if (password !== confirmPassword) {
                alert('Passwords do not match');
                return;
            }
            
            
            // In a real application, you would send this to a server
            console.log('Registration attempt:', { name, email, password });
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Creating Account...';
            submitBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Reset button
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                
                // Show success message
                alert('Account created successfully! Please check your email for verification.');
                // In a real app, you would redirect: window.location.href = '/login';
            }, 2000);
        });
        
        // Add subtle hover effect to card
        const registerCard = document.querySelector('.register-card');
        registerCard.addEventListener('mouseenter', () => {
            registerCard.style.transform = 'translateY(-4px)';
            registerCard.style.transition = 'transform 0.3s ease';
        });
        
        registerCard.addEventListener('mouseleave', () => {
            registerCard.style.transform = 'translateY(0)';
        });
    </script>
</body>
</html>