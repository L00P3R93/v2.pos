@extends('layouts.auth.app')

@section('title')
    <title>Confirm Password | POS Nexus</title>
@endsection

@section('content')
<div class="min-h-screen flex items-center justify-center px-6 py-12">
    <div class="w-full max-w-md">

        {{-- Card --}}
        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 p-8">

            {{-- Logo --}}
            <div class="flex items-center gap-3 mb-8">
                <img src="{{ asset('assets/img/logo/cashier-machine.png') }}" alt="POS" class="w-10 h-10">
                <div>
                    <h1 class="text-base font-bold text-gray-900 dark:text-white">POS Nexus</h1>
                    <p class="text-xs text-gray-400">Point of Sale System</p>
                </div>
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Confirm Password</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ __('Please confirm your password before continuing.') }}</p>
            </div>

            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
                @csrf

                <div x-data="{ show: false }">
                    <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Password</label>
                    <div class="relative">
                        <i class="ti ti-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-base pointer-events-none"></i>
                        <input
                            :type="show ? 'text' : 'password'"
                            id="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            class="w-full pl-10 pr-11 py-3 rounded-xl bg-gray-50 dark:bg-gray-800 border {{ $errors->has('password') ? 'border-rose-400 dark:border-rose-600' : 'border-gray-200 dark:border-gray-700' }} text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                            placeholder="••••••••"
                        >
                        <button type="button" @click="show = !show" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition-colors">
                            <i class="ti text-base" :class="show ? 'ti-eye-off' : 'ti-eye'"></i>
                        </button>
                    </div>
                    @error('password') <p class="text-xs text-rose-500 mt-1.5">{{ $message }}</p> @enderror
                </div>

                <button
                    type="submit"
                    class="w-full py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm transition-colors shadow-lg shadow-indigo-600/20 flex items-center justify-center gap-2"
                >
                    <i class="ti ti-lock-check text-base"></i>
                    Confirm Password
                </button>

                @if(Route::has('password.request'))
                    <div class="text-center">
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
                            Forgot your password?
                        </a>
                    </div>
                @endif
            </form>
        </div>

        <p class="mt-6 text-center text-xs text-gray-400">&copy; {{ date('Y') }} POS Nexus. All rights reserved.</p>
    </div>
</div>
@endsection
