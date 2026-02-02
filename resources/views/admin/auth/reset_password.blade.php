<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dark: '#0f172a',
                        primary: '#1e293b',
                        accent: '#9f7aea'
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-dark to-primary">

<div class="w-full max-w-md bg-primary border border-gray-700 rounded-2xl p-8 shadow-2xl">

    <!-- HEADER -->
    <div class="text-center mb-6">
        <div class="mx-auto w-14 h-14 bg-accent rounded-full flex items-center justify-center mb-3">
            <i class="fas fa-lock text-white text-2xl"></i>
        </div>
        <h2 class="text-2xl font-bold text-white">Reset Password</h2>
        <p class="text-gray-400 mt-1">
            Create a new password for your admin account
        </p>
    </div>

    <!-- SUCCESS MESSAGE -->
    @if (session('success'))
        <div class="mb-4 p-3 bg-green-900 bg-opacity-30 border border-green-700 rounded text-green-300 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- ERROR MESSAGE -->
    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-900 bg-opacity-30 border border-red-700 rounded text-red-300 text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- RESET PASSWORD FORM -->
    <form id="resetPasswordForm"
          method="POST"
          action="{{ route('admin.password.update') }}"
          class="space-y-5">
        @csrf

        <!-- NEW PASSWORD -->
        <div>
            <label class="block text-gray-400 text-sm mb-1">
                New Password
            </label>

            <div class="relative">
                <input type="password"
                       id="password"
                       name="password"
                       required
                       minlength="8"
                       class="w-full px-4 py-3 pr-12 bg-dark border border-gray-600 rounded-lg text-white focus:outline-none focus:border-accent">

                <button type="button"
                        onclick="togglePassword('password', this)"
                        class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-accent">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>

        <!-- CONFIRM PASSWORD -->
        <div>
            <label class="block text-gray-400 text-sm mb-1">
                Confirm Password
            </label>

            <div class="relative">
                <input type="password"
                       id="password_confirmation"
                       name="password_confirmation"
                       required
                       minlength="8"
                       class="w-full px-4 py-3 pr-12 bg-dark border border-gray-600 rounded-lg text-white focus:outline-none focus:border-accent">

                <button type="button"
                        onclick="togglePassword('password_confirmation', this)"
                        class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-accent">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>

        <!-- SUBMIT BUTTON -->
        <button type="submit"
                id="resetPasswordBtn"
                class="w-full py-3 bg-accent hover:bg-purple-500 text-white rounded-lg font-semibold transition flex items-center justify-center">
            <i class="fas fa-key mr-2"></i>
            Reset Password
        </button>
    </form>

</div>

<!-- SCRIPTS -->
<script>
    function togglePassword(fieldId, btn) {
        const input = document.getElementById(fieldId);
        const icon = btn.querySelector('i');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    document.getElementById('resetPasswordForm').addEventListener('submit', function () {
        const btn = document.getElementById('resetPasswordBtn');
        btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Resetting...';
        btn.disabled = true;
    });
</script>

</body>
</html>
