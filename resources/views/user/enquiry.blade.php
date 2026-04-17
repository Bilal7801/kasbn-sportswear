<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sportswear Enquiry</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-2xl mx-auto mt-12 bg-white p-8 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">
        Sportswear Product Enquiry
    </h2>

    <!-- Alert Box -->
    <div id="alertBox" class="hidden mb-4 p-4 rounded text-center font-medium text-sm"></div>

    <form id="enquiryForm" action="{{ route('enquiry.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Full Name -->
        <div>
            <label class="block text-sm font-medium">Full Name</label>
            <input type="text" name="name" required class="w-full border rounded p-2">
        </div>

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium">Email</label>
            <input type="email" name="email" required class="w-full border rounded p-2">
        </div>

        <!-- Phone -->
        <div>
            <label class="block text-sm font-medium">Phone / WhatsApp</label>
            <input type="text" name="phone" class="w-full border rounded p-2">
        </div>

        <!-- Country -->
        <div>
            <label class="block text-sm font-medium">Country <span class="text-red-500">*</span></label>
            <select name="country" id="country" required class="w-full border rounded p-2">
                <option value="">Select Your Country</option>
                <option value="US">United States 🇺🇸</option>
                <option value="GB">United Kingdom 🇬🇧</option>
                <option value="DE">Germany 🇩🇪</option>
                <option value="FR">France 🇫🇷</option>
                <option value="AU">Australia 🇦🇺</option>
                <option value="CA">Canada 🇨🇦</option>
                <option value="AE">UAE 🇦🇪</option>
                <option value="SA">Saudi Arabia 🇸🇦</option>
                <option value="NL">Netherlands 🇳🇱</option>
                <option value="ES">Spain 🇪🇸</option>
                <option value="IT">Italy 🇮🇹</option>
                <option value="TR">Turkey 🇹🇷</option>
                <option value="CN">China 🇨🇳</option>
                <option value="JP">Japan 🇯🇵</option>
                <option value="ZA">South Africa 🇿🇦</option>
                <option value="BR">Brazil 🇧🇷</option>
                <option value="NG">Nigeria 🇳🇬</option>
                <option value="KE">Kenya 🇰🇪</option>
                <option value="EG">Egypt 🇪🇬</option>
                <option value="PL">Poland 🇵🇱</option>
                <option value="SE">Sweden 🇸🇪</option>
                <option value="NO">Norway 🇳🇴</option>
                <option value="DK">Denmark 🇩🇰</option>
                <option value="MX">Mexico 🇲🇽</option>
                <option value="AR">Argentina 🇦🇷</option>
                <option value="SG">Singapore 🇸🇬</option>
                <option value="MY">Malaysia 🇲🇾</option>
                <option value="NZ">New Zealand 🇳🇿</option>
                <option value="OT">Other 🌍</option>
            </select>
        </div>

        <!-- Enquiry Type -->
        <div>
            <label class="block text-sm font-medium">Enquiry Type <span class="text-red-500">*</span></label>
            <select name="enquiry_type" required class="w-full border rounded p-2">
                <option value="">Select</option>
                <option value="bulk_order">Bulk Order</option>
                <option value="custom_branding">Custom Branding / Logo</option>
                <option value="pricing">Pricing</option>
                <option value="export">International Export</option>
            </select>
        </div>

        <!-- Product Category -->
        <div>
            <label class="block text-sm font-medium">Product Category</label>
            <select name="product_category" class="w-full border rounded p-2">
                <option value="">Select</option>
                <option value="tshirts">Sports T-Shirts</option>
                <option value="tracksuits">Track Suits</option>
                <option value="hoodies">Hoodies</option>
                <option value="shorts">Shorts</option>
                <option value="caps">Caps</option>
            </select>
        </div>

        <!-- Quantity -->
        <div>
            <label class="block text-sm font-medium">Estimated Quantity</label>
            <input type="number" name="quantity" min="1" class="w-full border rounded p-2">
        </div>

        <!-- Message -->
        <div>
            <label class="block text-sm font-medium">Message <span class="text-red-500">*</span></label>
            <textarea name="message" rows="4" required class="w-full border rounded p-2"
                placeholder="Tell us about your requirements..."></textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" id="submitBtn"
            class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition font-medium">
            Submit Enquiry
        </button>

    </form>
</div>

<script>
    document.getElementById('enquiryForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const form      = this;
        const btn       = document.getElementById('submitBtn');
        const alertBox  = document.getElementById('alertBox');
        const formData  = new FormData(form);

        // Disable button + show loading
        btn.disabled        = true;
        btn.textContent     = 'Submitting...';

        // Hide previous alert
        alertBox.className  = 'hidden';
        alertBox.textContent = '';

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept'       : 'application/json',
            },
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // ✅ Success
                alertBox.className   = 'mb-4 p-4 rounded text-center font-medium text-sm bg-green-100 text-green-700 border border-green-400';
                alertBox.textContent = '✅ ' + data.message;
                form.reset();
            } else {
                // ⚠️ Validation or other errors
                let errors = '';
                if (data.errors) {
                    Object.values(data.errors).forEach(err => {
                        errors += err[0] + ' ';
                    });
                }
                alertBox.className   = 'mb-4 p-4 rounded text-center font-medium text-sm bg-yellow-100 text-yellow-700 border border-yellow-400';
                alertBox.textContent = '⚠️ ' + (errors || data.message || 'Please check your inputs.');
            }
        })
        .catch(error => {
            // ❌ Server/Network error
            alertBox.className   = 'mb-4 p-4 rounded text-center font-medium text-sm bg-red-100 text-red-700 border border-red-400';
            alertBox.textContent = '❌ Something went wrong. Please try again.';
        })
        .finally(() => {
            // Re-enable button
            btn.disabled    = false;
            btn.textContent = 'Submit Enquiry';

            // Scroll to alert
            alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
        });
    });
</script>

</body>
</html>