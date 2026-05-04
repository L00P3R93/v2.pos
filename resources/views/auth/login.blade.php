@extends('layouts.auth.app')

@section('title')
    <title>Sign In | POS Nexus</title>
@endsection

@section('content')
<div class="min-h-screen flex">

    {{-- Left panel: form --}}
    <div class="flex-1 flex flex-col justify-center items-center px-6 py-12 lg:px-16 bg-white dark:bg-gray-900">

        {{-- Dark mode toggle --}}
        <div class="absolute top-4 right-4">
            <button
                onclick="(function(){var d=localStorage.getItem('posTheme')!=='light';localStorage.setItem('posTheme',d?'light':'dark');document.documentElement.classList.toggle('dark',!d);this.querySelector('.icon-moon').classList.toggle('hidden',!d);this.querySelector('.icon-sun').classList.toggle('hidden',d)}).call(this)"
                class="p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors"
            >
                <i class="ti ti-moon text-lg icon-moon {{ (request()->cookie('posTheme') === 'light') ? 'hidden' : '' }}"></i>
                <i class="ti ti-sun text-lg icon-sun {{ (request()->cookie('posTheme') !== 'light') ? 'hidden' : '' }}"></i>
            </button>
        </div>

        <div class="w-full max-w-sm">
            {{-- Logo --}}
            <div class="flex items-center gap-3 mb-10">
                <img src="{{ asset('assets/img/logo/cashier-machine.png') }}" alt="POS" class="w-10 h-10">
                <div>
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">POS Nexus</h1>
                    <p class="text-xs text-gray-400">Point of Sale System</p>
                </div>
            </div>

            {{-- Heading --}}
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Welcome back</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Sign in to your account to continue</p>
            </div>

            {{-- Alerts --}}
            @if(session('error') || $errors->any())
                <div class="flex items-start gap-3 px-4 py-3 rounded-xl bg-rose-50 dark:bg-rose-900/20 border border-rose-200 dark:border-rose-800 mb-6">
                    <i class="ti ti-alert-circle text-rose-500 text-lg flex-none mt-0.5"></i>
                    <div class="text-sm text-rose-700 dark:text-rose-300">
                        @if(session('error'))
                            {{ session('error') }}
                        @else
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endif

            @if(session('status'))
                <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 mb-6 text-sm text-emerald-700 dark:text-emerald-300">
                    <i class="ti ti-circle-check text-emerald-500 text-lg"></i>
                    {{ session('status') }}
                </div>
            @endif

            {{-- Form --}}
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
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

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Password</label>
                        <a href="{{ route('password.request') }}" class="text-xs text-indigo-600 dark:text-indigo-400 hover:underline">Forgot password?</a>
                    </div>
                    <div class="relative" x-data="{ show: false }">
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

                <div class="flex items-center gap-2.5">
                    <input
                        type="checkbox"
                        id="remember"
                        name="remember"
                        checked
                        class="w-4 h-4 rounded border-gray-300 dark:border-gray-600 text-indigo-600 focus:ring-indigo-500 bg-gray-50 dark:bg-gray-800"
                    >
                    <label for="remember" class="text-sm text-gray-600 dark:text-gray-400">Remember me</label>
                </div>

                <button
                    type="submit"
                    class="w-full py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-semibold text-sm transition-colors shadow-lg shadow-indigo-600/20 flex items-center justify-center gap-2"
                >
                    <i class="ti ti-login text-base"></i>
                    Sign In
                </button>
            </form>

            <p class="mt-8 text-center text-xs text-gray-400">&copy; {{ date('Y') }} POS Nexus. All rights reserved.</p>
        </div>
    </div>

    {{-- Right panel: illustration --}}
    <div class="hidden lg:flex flex-1 items-center justify-center bg-gradient-to-br from-indigo-600 via-indigo-700 to-violet-800 relative overflow-hidden">
        {{-- Background pattern --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-8 left-8 w-72 h-72 rounded-full bg-white"></div>
            <div class="absolute bottom-8 right-8 w-96 h-96 rounded-full bg-white"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 rounded-full bg-white"></div>
        </div>

        <div class="relative text-center text-white px-12 max-w-md">
            <div class="w-20 h-20 rounded-2xl bg-white/20 flex items-center justify-center mx-auto mb-6 backdrop-blur-sm">
                <img src="{{ asset('assets/img/logo/cashier-machine.png') }}" alt="POS" class="w-12 h-12">
            </div>
            <h2 class="text-3xl font-bold mb-4">POS Nexus</h2>
            <p class="text-indigo-200 text-sm leading-relaxed">
                A modern point-of-sale system built for speed and simplicity. Manage your sales, inventory, and customers in one place.
            </p>
            <div class="mt-8 grid grid-cols-3 gap-4">
                @foreach([['ti-shopping-cart', 'Fast Checkout'], ['ti-chart-bar', 'Analytics'], ['ti-users', 'Customers']] as [$icon, $label])
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3">
                        <i class="ti {{ $icon }} text-2xl block mb-1"></i>
                        <span class="text-xs font-medium text-indigo-100">{{ $label }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection
