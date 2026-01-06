@extends('layouts.new-layout')

@section('title', 'Profiles')

@section('content')

    <!-- ================= HEADER ================= -->
    <div class="max-w-6xl mx-auto mt-12 mb-10 px-4">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">

            <div class="flex items-center gap-4">
                <div class="p-3 bg-red-100 text-red-600 rounded-2xl shadow-sm">
                    <i class="fa-solid fa-user-group text-xl"></i>
                </div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    My Profiles
                </h1>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('profiles.create') }}"
                   class="group inline-flex items-center justify-center gap-2
              rounded-full
              bg-red-600 text-white

              px-4 py-2
              sm:px-6 sm:py-3

              text-sm
              font-semibold
              whitespace-nowrap

              shadow-md
              hover:bg-red-700 hover:shadow-lg
              focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2
              transition-all duration-300

              w-auto max-w-max">

                    <!-- Animated Plus Icon -->
                    <i class="fa-solid fa-plus text-sm
           transition-transform duration-300
           group-hover:rotate-90"></i>

                    <span>Create New Profile</span>
                </a>
            </div>


        </div>
    </div>

    <!-- ================= TABLE CARD ================= -->
    <div class="max-w-6xl mx-auto px-4">

        <div class="overflow-hidden rounded-3xl border border-gray-200 shadow-xl bg-white">
            <table class="w-full text-sm">

                <!-- TABLE HEAD -->
                <thead class="bg-gray-50">
                <tr class="text-gray-800 uppercase tracking-wider text-sm">
                    <th class="px-6 py-4 text-left">Profile Type</th>
                    <th class="px-6 py-4 text-left">Name</th>
                    <th class="px-6 py-4 text-center">Actions</th>
                </tr>
                </thead>

                <!-- TABLE BODY -->
                <tbody class="divide-y divide-gray-100">

                @forelse ($profiles as $profile)
                    <tr class="hover:bg-red-50/40 transition">

                        <!-- TYPE -->
                        <td class="px-6 py-4 font-semibold text-red-600">
                            {{ $profile->type }}
                        </td>

                        <!-- NAME -->
                        <td class="px-6 py-4 text-gray-700 font-medium">
                            {{ $profile->first_name }}{{ $profile->last_name ? ' ' . $profile->last_name : '' }}
                            @if($profile->breed_name)
                                <span class="text-sm text-gray-400">
                                ({{ $profile->breed_name }})
                            </span>
                            @endif
                        </td>

                        <!-- ACTIONS -->
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-6">

                                <a href="{{ route('profiles.edit', $profile) }}"
                                   class="text-gray-500 hover:text-blue-600 transition transform hover:scale-110"
                                   title="Edit Profile">
                                    <i class="fas fa-pen-to-square text-lg"></i>
                                </a>

                                <form action="{{ route('profiles.destroy', $profile) }}"
                                      method="POST"
                                      class="delete-profile inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-gray-500 hover:text-red-600 transition transform hover:scale-110"
                                            title="Delete Profile">
                                        <i class="fas fa-trash text-lg"></i>
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-14 text-gray-500">
                            No profiles found.
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>

        <!-- PAGINATION -->
        <div class="mt-8">
            {{ $profiles->links() }}
        </div>

    </div>
@endsection

<!-- ================= SCRIPTS (UNCHANGED LOGIC) ================= -->
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteForms = document.querySelectorAll('.delete-profile');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc2626',
                        cancelButtonColor: '#2563eb',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
