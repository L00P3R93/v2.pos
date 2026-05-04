@extends('layouts.auth.app')

@section('title')
    <title>Forgot Password | POS Nexus</title>
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
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Forgot your password?</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Enter your email and we'll send you a reset link.</p>
            </div>

            @if(session('status'))
                <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 text-sm text-emerald-700 dark:text-emerald-300 mb-5">
                    <i class="ti ti-circle-check text-emerald-500 text-lg flex-none"></i>
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                    <div class="relative">
                        <i class="ti ti-mail absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-base pointer-events-none"></i>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            autofocus
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-gray-800 border {{ $errors->has('email') ? 'border-rose-400 dark:border-rose-600' : 'border-gray-200 dark:border-gray-700' }} text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                            placeholder="you@example.com"
                        >
                    </div>
                    @error('email') <p class="text-xs text-rose-500 mt-1.5">{{ $message }}</p> @enderror
                </div>

                <button
                    type="submit"
                    class="w-full py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm transition-colors shadow-lg shadow-indigo-600/20 flex items-center justify-center gap-2"
                >
                    <i class="ti ti-send text-base"></i>
                    Send Reset Link
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline flex items-center justify-center gap-1.5">
                    <i class="ti ti-arrow-left text-sm"></i> Back to Sign In
                </a>
            </div>
        </div>

        <p class="mt-6 text-center text-xs text-gray-400">&copy; {{ date('Y') }} POS Nexus. All rights reserved.</p>
    </div>
</div>
@endsection
