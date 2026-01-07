<div id="HumanFields" class="hidden space-y-4 text-gray-600">

    <fieldset class="relative group
                overflow-hidden
                rounded-[2.75rem]
                p-8 md:p-10
                bg-gradient-to-br
                from-white/90 via-white/80 to-red-50/50
                backdrop-blur-2xl
                border border-red-300/40
                shadow-[0_30px_80px_rgba(220,38,38,0.22)]
                transition-all duration-700
                hover:shadow-[0_45px_120px_rgba(220,38,38,0.35)]
                hover:-translate-y-[2px]">

        <legend class="relative inline-flex items-center gap-3
               text-sm font-semibold tracking-wide
               text-gray-900
               px-5 py-2
               rounded-2xl
               bg-white/70
               backdrop-blur-md
               border border-red-200/70
               shadow-[0_10px_25px_rgba(220,38,38,0.15)]">

            <!-- icon -->
            <i class="fas fa-user text-xs text-red-600"></i>

            <!-- text -->
            <span>Personal Info</span>
        </legend>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 ">

            <div>
                <label for="first_name_human" class="block font-medium mb-1">First Name </label>
                <input type="text" name="human_first_name" id="first_name_human" value="{{ old('human_first_name', $profile->first_name) }}"
                       class="w-full text-gray-400 border border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500" />
            </div>
            <div>
                <label for="last_name" class="block font-medium mb-1">Last Name</label>
                <input type="text" name="human_last_name" id="last_name" value="{{ old('human_last_name', $profile->last_name) }}"
                       class="w-full border text-gray-400 border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500" />
            </div>
            <div>
                <label for="personal_number_human" class="block font-medium mb-1">Personal Number</label>
                <input type="text" name="human_personal_number" id="personal_number_human" value="{{ old('human_personal_number', $profile->personal_number) }}"
                       class="w-full border text-gray-400 border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500" />
            </div>
            <div>
                <label for="birth_date_human" class="block font-medium mb-1">Birth Date</label>
                <input type="date" name="human_birth_date" id="birth_date_human" value="{{ old('human_birth_date', $profile->birth_date) }}"
                       class="w-full border text-gray-400 border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500" />
            </div>
            <div>
                <label for="gender_human" class="block font-medium mb-1">Gender</label>
                <select name="human_gender" id="gender_human" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500">
                    <option value="">-- Select --</option>
                    <option value="Male" {{ old('human_gender', $profile->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('human_gender', $profile->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Others" {{ old('human_gender', $profile->gender) == 'Others' ? 'selected' : '' }}>Others</option>
                </select>
            </div>
            <div>
                <label for="hair_colour_human" class="block font-medium mb-1">Hair Color</label>
                <input type="text" name="human_hair_colour" id="hair_colour_human" value="{{ old('human_hair_colour', $profile->hair_colour) }}"
                       class="w-full text-gray-400 border border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500" />
            </div>
            <div>
                <label for="eye_color_human" class="block font-medium mb-1">Eye Color</label>
                <input type="text" name="human_eye_color" id="eye_color_human" value="{{ old('human_eye_color', $profile->eye_color) }}"
                       class="w-full text-gray-400 border border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500" />
            </div>
            <div>
                <label for="height_human" class="block font-medium mb-1">Height</label>
                <input type="text" name="human_height" id="height_human" value="{{ old('human_height', $profile->height) }}"
                       class="w-full text-gray-400 border border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500" />
            </div>
            <div>
                <label for="weight_human" class="block font-medium mb-1">Weight</label>
                <input type="text" name="human_weight" id="weight_human" value="{{ old('human_weight', $profile->weight) }}"
                       class="w-full text-gray-400 border border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500" />
            </div>
            <div class="md:col-span-2">
                <label for="identification_mark_human" class="block font-medium mb-1">Identification Mark</label>
                <input type="text" name="human_identification_mark" id="identification_mark_human" value="{{ old('human_identification_mark', $profile->identification_mark) }}"
                       class="w-full text-gray-400 border border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500" />
            </div>
            <div>
                <label for="blood_group_human" class="block font-medium mb-1">Blood Group</label>
                <input type="text" name="human_blood_group" id="blood_group_human" value="{{ old('human_blood_group', $profile->blood_group) }}"
                       class="w-full text-gray-400 border border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500" />
            </div>
        </div>
    </fieldset>

    <fieldset class="relative group
                overflow-hidden
                rounded-[2.75rem]
                p-8 md:p-10
                bg-gradient-to-br
                from-white/90 via-white/80 to-red-50/50
                backdrop-blur-2xl
                border border-red-300/40
                shadow-[0_30px_80px_rgba(220,38,38,0.22)]
                transition-all duration-700
                hover:shadow-[0_45px_120px_rgba(220,38,38,0.35)]
                hover:-translate-y-[2px]">

        <legend class="relative inline-flex items-center gap-3
               text-sm font-semibold tracking-wide
               text-gray-900
               px-5 py-2
               rounded-2xl
               bg-white/70
               backdrop-blur-md
               border border-red-200/70
               shadow-[0_10px_25px_rgba(220,38,38,0.15)]">

            <!-- icon -->
            <i class="fas fa-map-marker-alt text-xs text-red-600"></i>

            <!-- text -->
            <span>Address</span>
        </legend>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="city_human" class="block font-medium mb-1">City</label>
                <input type="text" name="human_city" id="city_human" value="{{ old('human_city', $profile->city) }}"
                       class="w-full text-gray-400 border border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500" />
            </div>
            <div>
                <label for="state_human" class="block font-medium mb-1">State</label>
                <input type="text" name="human_state" id="state_human" value="{{ old('human_state', $profile->state) }}"
                       class="w-full text-gray-400 border border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500" />
            </div>
            <div>
                <label for="zip_code_human" class="block font-medium mb-1">Zip Code</label>
                <input type="text" name="human_zip_code" id="zip_code_human" value="{{ old('human_zip_code', $profile->zip_code) }}"
                       class="w-full text-gray-400 border border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500" />
            </div>
        </div>
        <div class="mt-4">
            <label for="country_human" class="block font-medium mb-1">Country</label>
            <input type="text" name="human_country" id="country_human" value="{{ old('human_country', $profile->country) }}"
                   class="w-full text-gray-400 border border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500" />
        </div>
    </fieldset>


    <fieldset class="relative group
                overflow-hidden
                rounded-[2.75rem]
                p-8 md:p-10
                bg-gradient-to-br
                from-white/90 via-white/80 to-red-50/50
                backdrop-blur-2xl
                border border-red-300/40
                shadow-[0_30px_80px_rgba(220,38,38,0.22)]
                transition-all duration-700
                hover:shadow-[0_45px_120px_rgba(220,38,38,0.35)]
                hover:-translate-y-[2px]">

        <legend class="relative inline-flex items-center gap-3
               text-sm font-semibold tracking-wide
               text-gray-900
               px-5 py-2
               rounded-2xl
               bg-white/70
               backdrop-blur-md
               border border-red-200/70
               shadow-[0_10px_25px_rgba(220,38,38,0.15)]">

            <!-- icon -->
            <i class="fas fa-sticky-note text-xs text-red-600"></i>

            <!-- text -->
            <span>Notes</span>
        </legend>

        <textarea name="human_notes" rows="4"
                  class="w-full text-gray-400 border border-gray-300 rounded-md px-3 py-2 focus:ring-red-500 focus:border-red-500">{{ old('human_notes', $profile->notes) }}</textarea>
    </fieldset>
</div>
