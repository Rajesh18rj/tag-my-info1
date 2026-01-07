@if($profile->id)
    <div
        x-data="{
        preview: '{{ $profile->profile_image
            ? asset('storage/' . $profile->profile_image)
            : asset('images/empty.png') }}',
        selected: false
    }"
        class="mb-8 max-w-md"
    >

        <h4 class="text-lg font-semibold text-gray-800 mb-3">
            Profile Image
        </h4>

        <div class="flex items-center gap-6">

            <!-- Avatar -->
            <div class="relative group">
                <img
                    :src="preview"
                    class="w-20 h-20 rounded-full object-cover
                       border-2 border-gray-300 shadow-md
                       transition-transform duration-300
                       group-hover:scale-105"
                >

                <!-- Hover overlay -->
                <label
                    for="profile_image"
                    class="absolute inset-0 rounded-full
                       bg-black/40 opacity-0
                       group-hover:opacity-100
                       flex items-center justify-center
                       cursor-pointer
                       transition-all duration-300"
                >
                    <i class="fas fa-camera text-white text-xl"></i>
                </label>
            </div>

            <!-- Controls -->
            <div class="flex flex-col gap-2">

                <!-- Upload Button -->
                <label
                    for="profile_image"
                    class="inline-flex items-center gap-2
                       px-3 py-1.5 rounded-xl
                       font-semibold text-sm
                       bg-red-600 text-white
                       shadow
                       hover:bg-red-700
                       hover:shadow-lg
                       transition-all
                       cursor-pointer"
                >
                    <i class="fas fa-upload"></i>
                    <span x-text="selected ? 'Change Photo' : 'Upload Photo'"></span>
                </label>

                <!-- Helper Text -->
                <p class="text-[10px] text-gray-500">
                    JPG, PNG, JPEG • Max 2MB
                </p>

                <!-- Hidden Input -->
                <input
                    type="file"
                    name="profile_image"
                    id="profile_image"
                    accept="image/*"
                    class="hidden"
                    @change="
                    preview = URL.createObjectURL($event.target.files[0]);
                    selected = true
                "
                >

                @error('profile_image')
                <p class="text-sm font-medium text-red-600">
                    {{ $message }}
                </p>
                @enderror
            </div>

        </div>
    </div>
@endif
