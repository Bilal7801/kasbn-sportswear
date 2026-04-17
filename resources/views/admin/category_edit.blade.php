@extends('admin.layout')

@section('page-title', 'Edit Category - SportFit')
@section('header-title', 'Edit Category: ' . $category->name)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('admin.category.index') }}" class="text-gray-600 hover:text-primary transition flex items-center text-sm font-medium">
            <i class="fas fa-arrow-left mr-2"></i> Back to Categories
        </a>
    </div>

    {{-- Note the addition of the $category->id and @method('PUT') --}}
    <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">General Information</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Category Name</label>
                            <input type="text" name="name" value="{{ old('name', $category->name) }}" 
                                class="w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-primary outline-none transition">
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                            <textarea name="description" rows="4" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none transition">{{ old('description', $category->description) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Display Configuration</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Icon (FontAwesome)</label>
                            <input type="text" name="icon" placeholder="fas fa-running" value="{{ old('icon', $category->icon) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Parent Category</label>
                            <select name="parent_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary outline-none text-sm">
                                <option value="">None (Top Level)</option>
                                @foreach($parentCategories as $parent)
                                    <option value="{{ $parent->id }}" {{ (old('parent_id', $category->parent_id) == $parent->id) ? 'selected' : '' }}>
                                        {{ $parent->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-wider">Status</h3>
                    <div class="flex items-center justify-between py-2">
                        <span class="text-sm text-gray-600">Visible on Website</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            {{-- Checkbox logic: checked if status is true --}}
                            <input type="checkbox" name="status" value="1" class="sr-only peer" {{ $category->status ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-primary after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                        </label>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-wider">Thumbnail</h3>
                    <label for="thumbnail_input" class="relative group border-2 border-dashed border-gray-200 rounded-lg p-4 text-center hover:border-primary transition cursor-pointer block overflow-hidden">
                        
                        {{-- Show current image if it exists, otherwise show upload icon --}}
                        <div id="preview_container" class="{{ $category->image ? 'hidden' : '' }}">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-300 mb-2"></i>
                            <p class="text-xs text-gray-500">Click to change photo</p>
                        </div>

                        <img id="image_preview" 
                             src="{{ $category->image ? asset('storage/' . $category->image) : '#' }}" 
                             class="{{ $category->image ? '' : 'hidden' }} w-full h-32 object-cover rounded-lg">
                        
                        <input type="file" name="image" id="thumbnail_input" class="hidden" accept="image/*" onchange="previewImage(this)">
                    </label>
                    @error('image') <p class="text-red-500 text-xs mt-2 text-center">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-xl shadow-lg transition transform hover:-translate-y-1">
                    <i class="fas fa-save mr-2"></i> Update Category
                </button>
            </div>
        </div>
    </form>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('image_preview');
    const container = document.getElementById('preview_container');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            container.classList.add('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection