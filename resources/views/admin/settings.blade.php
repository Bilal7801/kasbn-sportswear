@extends('admin.layout')

@section('page-title', 'Settings - Sportswear Management')

@section('content')

<!-- Header -->
<div class="mb-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Admin Settings</h2>
            <p class="text-gray-600 mt-1">Manage your account settings and preferences</p>
        </div>
    </div>
</div>

{{-- SUCCESS / ERROR MESSAGES --}}
@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
        {{ $errors->first() }}
    </div>
@endif

<div class="gap-6">
<div class="lg:col-span-2 space-y-6">

{{-- ================= PROFILE FORM ================= --}}
<form method="POST" action="{{ route('admin.settings.profile') }}" enctype="multipart/form-data">
@csrf

<div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="font-semibold text-gray-900">Profile Information</h3>
        <p class="text-sm text-gray-500 mt-1">Update your account's profile information</p>
    </div>

    <div class="p-6 space-y-6">

        {{-- PROFILE IMAGE --}}
        <div class="flex items-start space-x-6">
            <div class="relative">
                <div class="h-32 w-32 rounded-lg overflow-hidden border-4 border-white shadow-lg">
                    <img id="profile-image"
                         src="{{ $admin->profile_image
                            ? asset('uploads/admin/'.$admin->profile_image)
                            : 'https://ui-avatars.com/api/?name='.$admin->name }}"
                         class="h-full w-full object-cover">
                </div>

                <div class="absolute bottom-0 right-0">
                    <label class="cursor-pointer bg-white rounded-full p-2 shadow-md">
                        <i class="fas fa-camera text-gray-700"></i>
                        <input type="file" name="profile_image" id="profile-upload" class="hidden" accept="image/*">
                    </label>
                </div>
            </div>

            <div class="flex-1">
                <h4 class="font-medium text-gray-900 mb-2">Profile Picture</h4>
                <p class="text-sm text-gray-600 mb-4">JPG, PNG or GIF (max 2MB)</p>
            </div>
        </div>

        {{-- FORM FIELDS --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium mb-2">Full Name *</label>
                <input type="text" name="name" value="{{ old('name',$admin->name) }}"
                       class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Email *</label>
                <input type="email" name="email" value="{{ old('email',$admin->email) }}"
                       class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Phone</label>
                <input type="text" name="phone" value="{{ old('phone',$admin->phone) }}"
                       class="w-full px-4 py-2 border rounded-lg">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium mb-2">Bio</label>
            <textarea name="bio" rows="3"
                      class="w-full px-4 py-2 border rounded-lg">{{ old('bio',$admin->bio) }}</textarea>
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-50 border-t text-right">
        <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Save Profile Changes
        </button>
    </div>
</div>
</form>

{{-- ================= PASSWORD FORM ================= --}}
<form method="POST" action="{{ route('admin.settings.password') }}">
@csrf

<div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="font-semibold text-gray-900">Security Settings</h3>
        <p class="text-sm text-gray-500 mt-1">Update your password</p>
    </div>

    <div class="p-6 space-y-4">
        <input type="password" name="current_password" placeholder="Current Password"
               class="w-full px-4 py-2 border rounded-lg">

        <input type="password" name="password" placeholder="New Password"
               class="w-full px-4 py-2 border rounded-lg">

        <input type="password" name="password_confirmation" placeholder="Confirm Password"
               class="w-full px-4 py-2 border rounded-lg">
    </div>

    <div class="px-6 py-4 bg-gray-50 border-t text-right">
        <button type="submit"
                class="px-6 py-2 bg-gray-800 text-white rounded-lg hover:bg-black">
            Update Security Settings
        </button>
    </div>
</div>
</form>

</div>
</div>

@endsection

@push('scripts')
<script>
document.getElementById('profile-upload').addEventListener('change', function(e){
    const file = e.target.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = e => document.getElementById('profile-image').src = e.target.result;
        reader.readAsDataURL(file);
    }
});
</script>
@endpush
