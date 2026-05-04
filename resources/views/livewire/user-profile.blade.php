<div class="min-h-screen bg-gray-100 dark:bg-gray-950" x-data="{ darkMode: localStorage.getItem('posTheme') !== 'light', toggleDark() { this.darkMode = !this.darkMode; localStorage.setItem('posTheme', this.darkMode ? 'dark' : 'light'); document.documentElement.classList.toggle('dark', this.darkMode); }, init() { document.documentElement.classList.toggle('dark', this.darkMode); } }">

    {{-- Header --}}
    <header class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 shadow-sm">
        <div class="max-w-3xl mx-auto px-4 h-14 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="flex items-center gap-2 text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition-colors">
                    <i class="ti ti-arrow-left text-lg"></i>
                </a>
                <div class="w-px h-5 bg-gray-200 dark:bg-gray-700"></div>
                <div class="flex items-center gap-2">
                    <img src="{{ asset('assets/img/logo/cashier-machine.png') }}" alt="POS" class="w-7 h-7">
                    <span class="font-bold text-sm text-gray-900 dark:text-white">Profile</span>
                </div>
            </div>
            <button @click="toggleDark()" class="p-2 rounded-lg text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                <i class="ti ti-sun text-base" x-show="darkMode" x-cloak></i>
                <i class="ti ti-moon text-base" x-show="!darkMode"></i>
            </button>
        </div>
    </header>

    <div class="max-w-3xl mx-auto px-4 py-6 sm:py-8 space-y-5">

        {{-- Feedback banner --}}
        @if($successMessage)
            <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 text-sm text-emerald-700 dark:text-emerald-400">
                <i class="ti ti-circle-check text-lg flex-none"></i>
                <span class="flex-1">{{ $successMessage }}</span>
                <button wire:click="$set('successMessage', null)" class="flex-none text-emerald-400 hover:text-emerald-600 transition-colors"><i class="ti ti-x text-sm"></i></button>
            </div>
        @endif
        @if($errorMessage)
            <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-rose-50 dark:bg-rose-900/20 border border-rose-200 dark:border-rose-800 text-sm text-rose-700 dark:text-rose-400">
                <i class="ti ti-alert-circle text-lg flex-none"></i>
                <span class="flex-1">{{ $errorMessage }}</span>
                <button wire:click="$set('errorMessage', null)" class="flex-none text-rose-400 hover:text-rose-600 transition-colors"><i class="ti ti-x text-sm"></i></button>
            </div>
        @endif

        {{-- ── Profile Photo ── --}}
        <div class="bg-white dark:bg-gray-900 rounded-2xl border border-gray-100 dark:border-gray-800 shadow-sm overflow-hidden">
            <div class="px-5 py-4 border-b border-gray-50 dark:border-gray-800 flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-indigo-100 dark:bg-indigo-900/40 flex items-center justify-center">
                    <i class="ti ti-camera text-base text-indigo-600 dark:text-indigo-400"></i>
                </div>
                <h2 class="font-bold text-sm text-gray-900 dark:text-white">Profile Photo</h2>
            </div>
            <div class="p-5 flex items-center gap-5">
                <div class="relative flex-none">
                    <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}" class="w-20 h-20 rounded-2xl ring-4 ring-indigo-100 dark:ring-indigo-900/40 object-cover">
                    @if(auth()->user()->avatar)
                        <button wire:click="removeAvatar" class="absolute -top-1.5 -right-1.5 w-5 h-5 rounded-full bg-rose-500 text-white flex items-center justify-center shadow-sm hover:bg-rose-600 transition-colors">
                            <i class="ti ti-x text-[9px]"></i>
                        </button>
                    @endif
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-400 mb-3">{{ auth()->user()->email }}</p>
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-2">Upload new photo</label>
                        <input wire:model="avatarUpload" type="file" accept="image/*" class="block w-full text-xs text-gray-500 dark:text-gray-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 dark:file:bg-indigo-900/30 file:text-indigo-700 dark:file:text-indigo-300 hover:file:bg-indigo-100 dark:hover:file:bg-indigo-900/50 cursor-pointer">
                        @error('avatarUpload') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <button wire:click="uploadAvatar" class="mt-3 px-4 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-semibold transition-colors shadow-sm">
                        <span wire:loading.remove wire:target="uploadAvatar">Save Photo</span>
                        <span wire:loading wire:target="uploadAvatar">Uploading…</span>
                    </button>
                </div>
            </div>
        </div>

        {{-- ── Profile Info ── --}}
        <div class="bg-white dark:bg-gray-900 rounded-2xl border border-gray-100 dark:border-gray-800 shadow-sm overflow-hidden">
            <div class="px-5 py-4 border-b border-gray-50 dark:border-gray-800 flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-violet-100 dark:bg-violet-900/40 flex items-center justify-center">
                    <i class="ti ti-user-edit text-base text-violet-600 dark:text-violet-400"></i>
                </div>
                <h2 class="font-bold text-sm text-gray-900 dark:text-white">Personal Info</h2>
            </div>
            <div class="p-5 space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-2">Display Name</label>
                    <input wire:model="name" type="text" class="w-full px-3 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                    @error('name') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-2">Email Address</label>
                    <input type="email" value="{{ auth()->user()->email }}" disabled class="w-full px-3 py-2.5 rounded-xl bg-gray-100 dark:bg-gray-800/50 border border-gray-200 dark:border-gray-700 text-sm text-gray-500 dark:text-gray-500 cursor-not-allowed">
                    <p class="text-[10px] text-gray-400 mt-1">Email cannot be changed from this page.</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-2">Role</label>
                    <input type="text" value="{{ auth()->user()->getRoleNames()->first() ?? '—' }}" disabled class="w-full px-3 py-2.5 rounded-xl bg-gray-100 dark:bg-gray-800/50 border border-gray-200 dark:border-gray-700 text-sm text-gray-500 dark:text-gray-500 cursor-not-allowed">
                </div>
                <button wire:click="updateProfile" class="px-5 py-2.5 rounded-xl bg-violet-600 hover:bg-violet-700 text-white text-sm font-semibold transition-colors shadow-sm">
                    <span wire:loading.remove wire:target="updateProfile">Save Changes</span>
                    <span wire:loading wire:target="updateProfile">Saving…</span>
                </button>
            </div>
        </div>

        {{-- ── Change Password ── --}}
        <div class="bg-white dark:bg-gray-900 rounded-2xl border border-gray-100 dark:border-gray-800 shadow-sm overflow-hidden">
            <div class="px-5 py-4 border-b border-gray-50 dark:border-gray-800 flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-amber-100 dark:bg-amber-900/40 flex items-center justify-center">
                    <i class="ti ti-lock text-base text-amber-600 dark:text-amber-400"></i>
                </div>
                <h2 class="font-bold text-sm text-gray-900 dark:text-white">Change Password</h2>
            </div>
            <div class="p-5 space-y-4">
                <div x-data="{ show: false }">
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-2">Current Password</label>
                    <div class="relative">
                        <input wire:model="currentPassword" :type="show ? 'text' : 'password'" placeholder="Enter current password" class="w-full pl-3 pr-10 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                        <button type="button" @click="show = !show" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200"><i class="ti text-sm" :class="show ? 'ti-eye-off' : 'ti-eye'"></i></button>
                    </div>
                    @error('currentPassword') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div x-data="{ show: false }">
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-2">New Password</label>
                    <div class="relative">
                        <input wire:model="newPassword" :type="show ? 'text' : 'password'" placeholder="Min 8 characters" class="w-full pl-3 pr-10 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                        <button type="button" @click="show = !show" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200"><i class="ti text-sm" :class="show ? 'ti-eye-off' : 'ti-eye'"></i></button>
                    </div>
                    @error('newPassword') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-2">Confirm New Password</label>
                    <input wire:model="newPasswordConfirmation" type="password" placeholder="Repeat new password" class="w-full px-3 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                </div>
                <button wire:click="updatePassword" class="px-5 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white text-sm font-semibold transition-colors shadow-sm">
                    <span wire:loading.remove wire:target="updatePassword">Update Password</span>
                    <span wire:loading wire:target="updatePassword">Updating…</span>
                </button>
            </div>
        </div>

        {{-- ── Account Info ── --}}
        <div class="bg-white dark:bg-gray-900 rounded-2xl border border-gray-100 dark:border-gray-800 shadow-sm overflow-hidden">
            <div class="px-5 py-4 border-b border-gray-50 dark:border-gray-800 flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
                    <i class="ti ti-info-circle text-base text-gray-500"></i>
                </div>
                <h2 class="font-bold text-sm text-gray-900 dark:text-white">Account</h2>
            </div>
            <div class="p-5 space-y-3">
                <div class="flex items-center justify-between py-2 border-b border-gray-50 dark:border-gray-800">
                    <span class="text-xs text-gray-500 dark:text-gray-400">Member since</span>
                    <span class="text-xs font-semibold text-gray-700 dark:text-gray-300">{{ auth()->user()->created_at->format('M d, Y') }}</span>
                </div>
                <div class="flex items-center justify-between py-2 border-b border-gray-50 dark:border-gray-800">
                    <span class="text-xs text-gray-500 dark:text-gray-400">Status</span>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 dark:bg-emerald-900/40 text-emerald-700 dark:text-emerald-400">{{ auth()->user()->status?->value ?? 'Active' }}</span>
                </div>
                <div class="pt-2">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('prof-logout').submit();" class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-rose-50 dark:bg-rose-900/20 border border-rose-200 dark:border-rose-800/50 text-sm font-semibold text-rose-600 dark:text-rose-400 hover:bg-rose-100 dark:hover:bg-rose-900/30 transition-colors w-fit">
                        <i class="ti ti-logout text-base"></i> Sign Out
                    </a>
                    <form id="prof-logout" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                </div>
            </div>
        </div>

    </div>
</div>
