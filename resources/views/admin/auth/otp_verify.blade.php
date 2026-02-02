<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify OTP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.tailwindcss.com"></script>
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
            <i class="fas fa-shield-alt text-white text-2xl"></i>
        </div>
        <h2 class="text-2xl font-bold text-white">Verify OTP</h2>
        <p class="text-gray-400 mt-1">Enter the 6-digit code sent to</p>
        <p class="text-accent font-semibold mt-1">
            {{ $admin->email }}
        </p>
    </div>

    <!-- ERRORS -->
    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-900 bg-opacity-30 border border-red-700 rounded text-red-300 text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- OTP FORM -->
    <form method="POST" action="{{ route('admin.otp.verify') }}" id="otpForm">
        @csrf

        <div class="flex justify-between gap-2 mb-4">
            @for ($i = 0; $i < 6; $i++)
                <input type="text" maxlength="1"
                       class="otp-input w-full h-14 text-center text-xl font-bold bg-dark border border-gray-600 rounded-lg text-white focus:outline-none focus:border-accent">
            @endfor
        </div>

        <input type="hidden" name="otp" id="otp">

        <button type="submit"
                class="w-full py-3 bg-accent hover:bg-purple-500 text-white rounded-lg font-semibold transition">
            Verify OTP
        </button>
    </form>

    <!-- RESEND -->
    <div class="text-center mt-6">
        <button id="resendBtn"
                class="text-gray-400 hover:text-accent text-sm transition">
            <i class="fas fa-redo mr-1"></i> Resend OTP
        </button>
    </div>

</div>

<script>
    const inputs = document.querySelectorAll('.otp-input');
    const otpHidden = document.getElementById('otp');

    inputs.forEach((input, index) => {
        input.addEventListener('input', e => {
            if (!/^\d$/.test(e.target.value)) {
                e.target.value = '';
                return;
            }
            if (index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
            updateOtp();
        });

        input.addEventListener('keydown', e => {
            if (e.key === 'Backspace' && !input.value && index > 0) {
                inputs[index - 1].focus();
            }
        });
    });

    function updateOtp() {
        otpHidden.value = Array.from(inputs).map(i => i.value).join('');
    }

    // RESEND OTP
    document.getElementById('resendBtn').addEventListener('click', function () {
        fetch("{{ route('admin.otp.resend') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                "Accept": "application/json"
            }
        })
        .then(res => res.json())
        .then(data => {
            alert(data.message);
            inputs.forEach(i => i.value = '');
            otpHidden.value = '';
            inputs[0].focus();
        });
    });

    inputs[0].focus();
</script>

</body>
</html>
