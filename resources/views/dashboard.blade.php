@extends('layouts.new-layout')

@section('content')
    <!-- Main dashboard area -->
    <main class="max-w-7xl flex-1 px-4 sm:px-6 lg:px-8 mt-8 relative overflow-hidden">

        {{-- Floating background elements --}}
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-20 left-10 w-24 h-24 bg-red-500/5 rounded-full blur-xl animate-ping" style="animation-delay: 0s;"></div>
            <div class="absolute bottom-20 right-20 w-32 h-32 bg-red-400/10 rounded-full blur-2xl animate-pulse" style="animation-delay: 2s;"></div>
        </div>

        {{-- Welcome title with underline animation --}}
        <h1 class="relative z-10 inline-flex items-center gap-4 mb-12">
            <span
                class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-red-500 to-red-600 text-white
                       shadow-lg shadow-red-400/50 animate-float"
            >
                <i class="fa-regular fa-face-smile text-2xl"></i>
            </span>

            <div class="flex flex-col">
                <span class="text-xs sm:text-sm font-semibold uppercase tracking-[0.25em] text-gray-500 animate-slide-up">
                    Welcome
                </span>

                <span
                    class="relative inline-block text-2xl sm:text-3xl font-bold tracking-wide text-gray-900 animate-slide-up"
                    style="animation-delay: 0.2s;"
                >
                    {!! ucfirst(auth()->user()->name ?? 'Guest') !!}

                    <!-- animated underline -->
                    <span
                        class="absolute left-0 -bottom-1 h-1 w-12 bg-gradient-to-r from-red-500 to-red-600 rounded-full
                               origin-left scale-x-0 animate-[welcomeLine_1s_ease-out_forwards]"
                    ></span>
                </span>
            </div>
        </h1>

        {{-- Cards with staggered entrance --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 relative z-10">
            <!-- Card 1 -->
            <div
                class="group relative overflow-hidden rounded-2xl border border-red-100 bg-white
                       px-8 py-10 shadow-xl shadow-red-100
                       opacity-0 translate-y-10 animate-[fadeInUp_0.6s_ease-out_0.2s_forwards]
                       hover:opacity-100
                       transition-all duration-500 ease-out hover:-translate-y-3 hover:scale-[1.02] hover:shadow-2xl hover:shadow-red-300/50 hover:border-red-300"
            >
                <div class="absolute inset-0 bg-gradient-to-tr from-red-50/70 via-transparent to-white/80 pointer-events-none"></div>

                <div class="relative flex items-center justify-between gap-6">
                    <div>
                        <p class="text-sm uppercase tracking-[0.2em] font-semibold text-gray-500 mb-2 animate-fade-in">
                            Mood
                        </p>
                        <p class="text-3xl font-bold text-gray-900 leading-tight animate-fade-in" style="animation-delay: 0.1s;">
                            Have a <span class="text-red-600">Great</span> Day!
                        </p>
                    </div>

                    <div
                        class="flex h-16 w-16 items-center justify-center rounded-2xl border-2 border-red-200
                               bg-red-50 text-red-600 group-hover:bg-red-500 group-hover:text-white
                               transition-all duration-300 ease-out group-hover:scale-110 group-hover:rotate-6"
                    >
                        <i class="fa-solid fa-sun text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div
                class="group relative overflow-hidden rounded-2xl border border-red-100 bg-white
                       px-8 py-10 shadow-xl shadow-red-100
                       opacity-0 translate-y-10 animate-[fadeInUp_0.6s_ease-out_0.4s_forwards]
                       hover:opacity-100
                       transition-all duration-500 ease-out hover:-translate-y-3 hover:scale-[1.02] hover:shadow-2xl hover:shadow-red-300/50 hover:border-red-300"
            >
                <div class="absolute inset-0 bg-gradient-to-tr from-red-50/70 via-transparent to-white/80 pointer-events-none"></div>

                <div class="relative flex items-center justify-between gap-6">
                    <div>
                        <p class="text-sm uppercase tracking-[0.2em] font-semibold text-gray-500 mb-2 animate-fade-in">
                            Reminder
                        </p>
                        <p class="text-3xl font-bold text-gray-900 leading-tight animate-fade-in" style="animation-delay: 0.1s;">
                            Stay <span class="text-red-600">Happy</span> & Safe!
                        </p>
                    </div>

                    <div
                        class="flex h-16 w-16 items-center justify-center rounded-2xl border-2 border-red-200
                               bg-red-50 text-red-600 group-hover:bg-red-500 group-hover:text-white
                               transition-all duration-300 ease-out group-hover:scale-110 group-hover:-rotate-6"
                    >
                        <i class="fa-solid fa-heart-pulse text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Enhanced animation keyframes --}}
        <style>
            @keyframes welcomeLine {
                0% { transform: scaleX(0); opacity: 0; }
                40% { opacity: 1; }
                100% { transform: scaleX(1); opacity: 1; }
            }

            @keyframes fadeInUp {
                0% {
                    opacity: 0;
                    transform: translateY(20px);
                }
                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes slideUp {
                0% {
                    opacity: 0;
                    transform: translateY(15px);
                }
                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-5px); }
            }

            @keyframes fade-in {
                0% { opacity: 0; }
                100% { opacity: 1; }
            }
        </style>
    </main>
@endsection
