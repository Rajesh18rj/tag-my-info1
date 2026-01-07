@extends('layouts.new-layout')

@section('title', $profile->exists ? 'Edit Profile' : 'Create Profile')

@section('content')
    <h1 class="max-w-6xl mx-auto ml-2 mt-6 mb-8 px-0
           flex items-center gap-3
           text-2xl md:text-3xl font-semibold
           text-black">

        <!-- Red accent bar -->
        <span class="w-1 h-7 bg-red-600 rounded-full"></span>

        <!-- Icon -->
        <i class="fas {{ $profile->exists ? 'fa-user-edit' : 'fa-user-plus' }}
              text-red-600 text-lg"></i>

        <!-- Text -->
        <span class="tracking-tight">
        {{ $profile->exists ? 'Edit Profile' : 'Create New Profile' }}
    </span>
    </h1>


    <!-- Link To QR and Toggle Button -->
    @if($profile->exists)
        <div class="mb-4 max-w-6xl mx-auto flex justify-between items-start ml-2 mr-2">

            <!-- QR Link  -->
            <div class="flex flex-col items-start gap-1">

                <a href="{{ route('profiles.link-qr', $profile->id) }}"
                   class="group inline-flex items-center gap-2 rounded-full
                  border border-blue-500/70 bg-blue-600/90
                  px-3 py-1.5 text-xs font-medium text-white
                  shadow-sm hover:bg-blue-500 hover:shadow-md hover:shadow-blue-500/40
                  active:scale-[0.97]
                  transition-all duration-200">

                    <i class="fas fa-qrcode text-sm
                      transition-transform duration-300
                      group-hover:rotate-12 group-hover:scale-110"></i>

                    <span>Link to QR</span>

                    <span class="inline-flex h-5 w-5 items-center justify-center rounded-full
                         bg-white/15 text-[10px]
                         transition-transform duration-300
                         group-hover:translate-x-1">
                <i class="fas fa-arrow-right"></i>
            </span>
                </a>

                <!-- QR Guidance -->
                <p class="flex items-start gap-1.5 text-[11px] text-gray-400 leading-snug max-w-[240px]">
                    <i class="fas fa-tag mt-[2px]"></i>
                    <span>Link a QR tag to this profile</span>
                </p>

            </div>

            <!-- Public Toggle + Disclaimer -->
            <div class="flex flex-col items-end gap-1">

                <button type="button"
                        id="togglePublicBtn"
                        data-id="{{ $profile->id }}"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-3xl
                       font-semibold shadow transition-all duration-200
                       active:scale-95
                       {{ $profile->is_public
                           ? 'bg-green-600 text-white hover:bg-green-700'
                           : 'bg-gray-400 text-white hover:bg-gray-500' }}">

                    <i class="fas {{ $profile->is_public ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                    <span>{{ $profile->is_public ? 'Public' : 'Private' }}</span>
                </button>

                <p id="visibilityNote"
                   class="text-[11px] text-right
                  {{ $profile->is_public ? 'text-green-600' : 'text-gray-500' }}">

                    <i class="fas {{ $profile->is_public ? 'fa-globe' : 'fa-lock' }} mr-1"></i>
                    <span>
                {{ $profile->is_public
                    ? 'Profile is publicly visible'
                    : 'Only you can see this profile' }}
            </span>
                </p>

            </div>
        </div>
    @endif

    @if($profile->exists)
        <!-- TABS Navigation -->
        <div class="mb-1">
            <nav class="max-w-6xl mx-auto flex gap-10 px-2 border-b border-gray-200">

                <button type="button"
                        class="tablinks flex items-center gap-2
                       pb-3 text-sm font-semibold
                       text-gray-500 border-b-2 border-transparent
                       hover:text-red-600 hover:border-red-600
                       transition"
                        onclick="openTab(event, 'profile-details')"
                        id="defaultOpen">

                    <i class="fas fa-address-card text-red-600 text-xl"></i>
                    PROFILE DETAILS
                </button>

                <button type="button"
                        class="tablinks flex items-center gap-2
               pb-3 text-sm font-semibold
               text-gray-500 border-b-2 border-transparent
               hover:text-red-600 hover:border-red-600
               transition"
                        onclick="openTab(event, 'additional-info')">

                    <i class="fas fa-plus-circle text-red-600 text-xl subtle-plus"></i>
                    ADDITIONAL INFO
                </button>

                <style>
                    @keyframes softPulse {
                        0%, 100% {
                            transform: scale(1);
                            opacity: 1;
                        }
                        50% {
                            transform: scale(1.12);
                            opacity: 0.9;
                        }
                    }

                    .subtle-plus {
                        animation: softPulse 2.2s ease-in-out infinite;
                    }
                </style>

            </nav>
        </div>


        <div class="rounded-2xl shadow-lg bg-white p-4 max-w-6xl mx-auto mt-1">
            <!-- Profile Details Tab -->
            <div id="profile-details" class="tabcontent">
                <form action="{{ route('profiles.update', $profile) }}" method="POST" enctype="multipart/form-data"
                      class="space-y-4 max-w-6xl " id="profileForm">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="profileType" class="block mb-2 font-semibold text-gray-700 text-lg">Profile Type</label>
                        <div class=" relative">
                            <select id="profileType" disabled
                                    class="w-full appearance-none rounded-lg border border-gray-300 bg-white px-4 py-3 pr-10 text-gray-800 font-medium shadow-sm
                               focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-300">
                                <option value="">-- Select Type --</option>
                                <option value="Human" {{ old('type', $profile->type) == 'Human' ? 'selected' : '' }}>Human</option>
                                <option value="Pet" {{ old('type', $profile->type) == 'Pet' ? 'selected' : '' }}>Pet</option>
                                <option value="Valuables" {{ old('type', $profile->type) == 'Valuables' ? 'selected' : '' }}>Valuables</option>
                            </select>

                            <input type="hidden" name="type" value="{{ $profile->type }}">

                            <!-- Custom down arrow icon -->
                            <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('type')
                        <p class="mt-1 text-sm font-medium text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Profiles Image Section -->
                    @include('profiles.profiles-image-section')

            <!--------- Partials--------------->

                    <!-- Human Fields -->
                    @include('profiles.partials.human')

                    <!-- Pet Fields -->
                    @include('profiles.partials.pet')

                    <!-- Valuables Fields -->
                    @include('profiles.partials.valuable')

                    <div>
                        <button type="submit"
                                class="bg-red-600 px-6 py-2 mb-4 rounded-2xl text-white text-lg font-semibold hover:bg-red-700 transition">
                            Update Profile
                        </button>
                    </div>
                </form>
            </div>

            <!-- Additional Info Tab -->
            <div id="additional-info" class="tabcontent hidden">

        <!--------------------- Additional Information Section ------------------------------------->

                <!-- For Emergency Contacts Pop-up -->
                @if($profile->id && ($profile->type == 'Human'))
                    @include('profiles.modals.emergency_contact')
                @endif

                <!-- For Pet Owner Pop-up -->
                @if($profile->id && ($profile->type == 'Pet'))
                    @include('profiles.modals.pet-owner')
                @endif

                <!-- For Allergy Pop-up -->
                @if($profile->id && ($profile->type == 'Human' || $profile->type == 'Pet'))
                    @include('profiles.modals.allergy1')
                @endif

                <!-- For Medication Pop-up -->
                @if($profile->id && ($profile->type == 'Human' || $profile->type == 'Pet'))
                    @include('profiles.modals.medications')
                @endif

                <!-- For Health Insurance Pop-up -->
                @if($profile->id && ($profile->type == 'Human'))
                    @include('profiles.modals.health-insurance')
                @endif

                <!-- For Vet Details Pop-up -->
                @if($profile->id && ($profile->type == 'Pet'))
                    @include('profiles.modals.vet-details')
                @endif

                <!-- For Instructions Pop-up -->
                @if($profile->id && ($profile->type == 'Pet'))
                    @include('profiles.modals.instruction')
                @endif

                <!-- For Vital Medical Condition Pop-up -->
                @if($profile->id && ($profile->type == 'Human'))
                    @include('profiles.modals.vital-medical-condition')
                @endif
            </div>
        </div>
    @else
        <!-- Create Profile Form (no tabs) -->
        <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data"
              class="space-y-6 max-w-6xl mx-auto " id="profileForm">
            @csrf

            <div class="mb-6">
                <label for="profileType" class="block mb-2 font-semibold text-gray-700 text-lg">Profile Type</label>
                <div class="relative">
                    <select name="type" id="profileType" required
                            class="w-full appearance-none rounded-lg border border-gray-300 bg-white px-4 py-3 pr-10 text-gray-800 font-medium shadow-sm
                       focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-300">
                        <option value="">-- Select Type --</option>
                        <option value="Human" {{ old('type', $profile->type) == 'Human' ? 'selected' : '' }}>Human</option>
                        <option value="Pet" {{ old('type', $profile->type) == 'Pet' ? 'selected' : '' }}>Pet</option>
                        <option value="Valuables" {{ old('type', $profile->type) == 'Valuables' ? 'selected' : '' }}>Valuables</option>
                    </select>
                    <!-- Custom down arrow icon -->
                    <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                @error('type')
                <p class="mt-1 text-sm font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Profiles Image Section -->
            @include('profiles.profiles-image-section')

    <!--------- Partials--------------->

            <!-- Human Fields -->
            @include('profiles.partials.human')

            <!-- Pet Fields -->
            @include('profiles.partials.pet')

            <!-- Valuables Fields -->
            @include('profiles.partials.valuable')

            <div>
                <button type="submit"
                        class="bg-red-600 px-6 py-2 mb-4 rounded-2xl text-white text-lg font-semibold hover:bg-red-700 transition">
                    Create Profile
                </button>
            </div>
        </form>
    @endif
@endsection

@section('scripts')
    <script>
        // Tab logic: Show/Hide tab panels and update tab styles
        function openTab(evt, tabName) {
            var tabcontent = document.getElementsByClassName("tabcontent");
            for (var i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.add('hidden');
            }
            var tablinks = document.getElementsByClassName("tablinks");
            for (var i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove('border-red-600','text-red-600','bg-white','shadow-md');
                tablinks[i].classList.add('border-transparent', 'text-gray-700');
            }
            document.getElementById(tabName).classList.remove('hidden');
            evt.currentTarget.classList.add('border-red-600','text-red-600','bg-white','shadow-md');
            evt.currentTarget.classList.remove('border-transparent', 'text-gray-700');
        }
        // Open first tab by default (only when editing)
        document.addEventListener("DOMContentLoaded", function() {
            var defaultTab = document.getElementById("defaultOpen");
            if (defaultTab) {
                defaultTab.click();
            }

        });

        // Existing JS for profile type dynamic fields
        document.addEventListener('DOMContentLoaded', function () {
            const typeSelect = document.getElementById('profileType');
            const humanFields = document.getElementById('HumanFields');
            const petFields = document.getElementById('PetFields');
            const valuablesFields = document.getElementById('ValuablesFields');
            function showFields(type) {
                humanFields.classList.add('hidden');
                petFields.classList.add('hidden');
                valuablesFields.classList.add('hidden');
                if (type === 'Human') {
                    humanFields.classList.remove('hidden');
                } else if (type === 'Pet') {
                    petFields.classList.remove('hidden');
                } else if (type === 'Valuables') {
                    valuablesFields.classList.remove('hidden');
                }
            }
            // Initial display
            showFields(typeSelect.value);

            typeSelect.addEventListener('change', () => {
                showFields(typeSelect.value);
            });
        });
    </script>

    <!----- For Toggle Bar ---->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn  = document.getElementById('togglePublicBtn');
            const note = document.getElementById('visibilityNote');

            if (!btn || !note) return;

            btn.addEventListener('click', function () {
                const profileId = btn.dataset.id;

                fetch("{{ url('/profiles') }}/" + profileId + "/toggle-public", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                })
                    .then(res => res.json())
                    .then(data => {
                        if (!data.success) return;

                        const btnIcon  = btn.querySelector('i');
                        const btnText  = btn.querySelector('span');
                        const noteIcon = note.querySelector('i');
                        const noteText = note.querySelector('span');

                        if (data.is_public) {
                            // ✅ PUBLIC
                            btn.classList.remove('bg-gray-400','hover:bg-gray-500');
                            btn.classList.add('bg-green-600','hover:bg-green-700');

                            btnIcon.className = 'fas fa-eye';
                            btnText.textContent = 'Public';

                            note.classList.remove('text-gray-500');
                            note.classList.add('text-green-600');

                            noteIcon.className = 'fas fa-globe mr-1';
                            noteText.textContent = 'Profile is publicly visible';
                        } else {
                            // 🔒 PRIVATE
                            btn.classList.remove('bg-green-600','hover:bg-green-700');
                            btn.classList.add('bg-gray-400','hover:bg-gray-500');

                            btnIcon.className = 'fas fa-eye-slash';
                            btnText.textContent = 'Private';

                            note.classList.remove('text-green-600');
                            note.classList.add('text-gray-500');

                            noteIcon.className = 'fas fa-lock mr-1';
                            noteText.textContent = 'Only you can see this profile';
                        }
                    })
                    .catch(err => console.error(err));
            });
        });
    </script>
@endsection
