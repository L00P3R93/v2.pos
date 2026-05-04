@extends('layouts.auth.app')

@section('title')
    <title>Verify Email | POS Nexus</title>
@endsection

@section('content')
<div class="min-h-screen flex items-center justify-center px-6 py-12">
    <div class="w-full max-w-md">

        {{-- Card --}}
        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 p-8 text-center">

            {{-- Icon --}}
            <div class="w-16 h-16 rounded-2xl bg-indigo-100 dark:bg-indigo-900/40 flex items-center justify-center mx-auto mb-6">
                <i class="ti ti-mail text-3xl text-indigo-600 dark:text-indigo-400"></i>
            </div>

            {{-- Logo --}}
            <div class="flex items-center justify-center gap-2 mb-6">
                <img src="{{ asset('assets/img/logo/cashier-machine.png') }}" alt="POS" class="w-8 h-8">
                <span class="font-bold text-gray-900 dark:text-white">POS Nexus</span>
            </div>

            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ __('Verify Your Email') }}</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-6 leading-relaxed">
                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email, click below to request another.') }}
            </p>

            @if(session('resent'))
                <div class="flex items-center gap-2 px-4 py-3 rounded-xl bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 text-sm text-emerald-700 dark:text-emerald-300 mb-5">
                    <i class="ti ti-circle-check text-emerald-500 text-lg flex-none"></i>
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button
                    type="submit"
                    class="w-full py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm transition-colors shadow-lg shadow-indigo-600/20 flex items-center justify-center gap-2"
                >
                    <i class="ti ti-send text-base"></i>
                    {{ __('Resend Verification Email') }}
                </button>
            </form>

            <div class="mt-5 flex items-center justify-center">
                <a href="{{ route('logout') }}" class="text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition-colors flex items-center gap-1.5"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="ti ti-logout text-sm"></i> Sign out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
            </div>
        </div>

        <p class="mt-6 text-center text-xs text-gray-400">&copy; {{ date('Y') }} POS Nexus. All rights reserved.</p>
    </div>
</div>
@endsection
