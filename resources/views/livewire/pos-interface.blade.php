<div
    class="flex flex-col h-screen overflow-hidden bg-gray-100 dark:bg-gray-950"
    x-data="{
        darkMode: localStorage.getItem('posTheme') !== 'light',
        showCustomerModal: false,
        showPaymentModal: false,
        showSalesModal: false,
        showResetModal: false,
        showSavedCartsModal: false,
        showSaveCartModal: false,
        showMobileCart: false,
        showProfileMenu: false,
        paymentMethod: null,
        localCartQtys: {},
        toasts: [],

        get localCartCount() {
            return Object.values(this.localCartQtys).reduce((s, q) => s + q, 0);
        },

        toggleDark() {
            this.darkMode = !this.darkMode;
            localStorage.setItem('posTheme', this.darkMode ? 'dark' : 'light');
            document.documentElement.classList.toggle('dark', this.darkMode);
        },

        selectPayment(method) {
            this.paymentMethod = method;
            $wire.set('paymentMethod', method);
        },

        addToast(message, type = 'success') {
            const id = Date.now();
            this.toasts.push({ id, message, type });
            setTimeout(() => { this.toasts = this.toasts.filter(t => t.id !== id); }, 3500);
        },

        init() {
            document.documentElement.classList.toggle('dark', this.darkMode);

            $wire.on('cart-updated', (data) => {
                const qtys = {};
                Object.values(data.items).forEach(item => { qtys[item.id] = item.qty; });
                this.localCartQtys = qtys;
            });

            $wire.on('order-completed', () => { this.showPaymentModal = false; this.showMobileCart = false; this.paymentMethod = null; });
            $wire.on('customer-created', () => { this.showCustomerModal = false; });
            $wire.on('cart-cleared', () => { this.showResetModal = false; this.showMobileCart = false; });
            $wire.on('cart-saved', () => { this.showSaveCartModal = false; });
            $wire.on('cart-restored', () => { this.showSavedCartsModal = false; });

            $wire.on('toast', (data) => { this.addToast(data.message, data.type); });
        }
    }"
>

    {{-- ===== TOAST NOTIFICATIONS ===== --}}
    <div class="fixed top-4 right-4 z-[200] flex flex-col gap-2 pointer-events-none" aria-live="polite">
        <template x-for="toast in toasts" :key="toast.id">
            <div
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-x-4"
                x-transition:enter-end="opacity-100 translate-x-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-x-0"
                x-transition:leave-end="opacity-0 translate-x-4"
                :class="toast.type === 'success'
                    ? 'bg-emerald-600 shadow-emerald-600/30'
                    : 'bg-rose-600 shadow-rose-600/30'"
                class="pointer-events-auto flex items-center gap-3 px-4 py-3 rounded-xl shadow-lg text-white text-sm font-medium max-w-xs"
            >
                <i :class="toast.type === 'success' ? 'ti ti-circle-check' : 'ti ti-alert-circle'" class="ti text-base flex-none"></i>
                <span x-text="toast.message" class="flex-1"></span>
            </div>
        </template>
    </div>

    {{-- ===== HEADER ===== --}}
    <header class="flex-none flex items-center justify-between px-3 sm:px-4 h-14 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 shadow-sm z-10">
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <img src="{{ asset('assets/img/logo/cashier-machine.png') }}" alt="POS" class="w-8 h-8">
            <span class="font-bold text-sm text-gray-900 dark:text-white hidden sm:block">POS Nexus</span>
        </a>

        <div class="hidden lg:flex items-center text-[11px] text-gray-400 dark:text-gray-500 gap-1.5">
            <i class="ti ti-clock text-sm"></i>
            <span x-data="{ t: '' }" x-init="setInterval(() => t = new Date().toLocaleString('en-KE', { weekday: 'short', day: '2-digit', month: 'short', hour: '2-digit', minute: '2-digit', second: '2-digit' }), 1000)" x-text="t"></span>
        </div>

        <div class="flex items-center gap-1 sm:gap-2">
            {{-- Today's Sales --}}
            <button @click="showSalesModal = true" class="flex items-center gap-1.5 px-2 sm:px-3 py-1.5 rounded-lg bg-emerald-50 dark:bg-emerald-900/20 text-emerald-700 dark:text-emerald-400 hover:bg-emerald-100 dark:hover:bg-emerald-900/40 border border-emerald-200 dark:border-emerald-800/50 transition-colors text-xs font-semibold">
                <i class="ti ti-chart-bar text-sm"></i>
                <span class="hidden sm:inline">Sales</span>
            </button>

            {{-- Dark mode --}}
            <button @click="toggleDark()" class="p-2 rounded-lg text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                <i class="ti ti-sun text-base" x-show="darkMode" x-cloak></i>
                <i class="ti ti-moon text-base" x-show="!darkMode"></i>
            </button>

            {{-- Admin --}}
            <a href="/admin" class="hidden sm:flex p-2 rounded-lg text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors" title="Admin">
                <i class="ti ti-layout-dashboard text-base"></i>
            </a>

            {{-- Profile --}}
            <div class="relative" @click.outside="showProfileMenu = false">
                <button @click="showProfileMenu = !showProfileMenu" class="flex items-center gap-1.5 pl-1 pr-2 py-1 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                    <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}" class="w-7 h-7 rounded-full ring-2 ring-indigo-400/40">
                    <div class="hidden sm:block text-left">
                        <p class="text-[11px] font-semibold text-gray-900 dark:text-white leading-tight">{{ Str::limit(auth()->user()->name, 14) }}</p>
                        <p class="text-[10px] text-gray-400 leading-tight">{{ auth()->user()->getRoleNames()->first() }}</p>
                    </div>
                    <i class="ti ti-chevron-down text-[10px] text-gray-400 hidden sm:block"></i>
                </button>
                <div x-show="showProfileMenu" x-cloak x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 top-full mt-1 w-48 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 py-1.5 z-50">
                    <a href="{{ route('pos.profile') }}" class="flex items-center gap-2.5 px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <i class="ti ti-user-circle text-base text-indigo-500"></i> Profile & Settings
                    </a>
                    <a href="/admin" class="flex items-center gap-2.5 px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <i class="ti ti-layout-dashboard text-base text-violet-500"></i> Admin Panel
                    </a>
                    <div class="border-t border-gray-100 dark:border-gray-700 my-1"></div>
                    <a href="{{ route('logout') }}" class="flex items-center gap-2.5 px-3 py-2 text-sm text-rose-600 dark:text-rose-400 hover:bg-rose-50 dark:hover:bg-rose-900/20 transition-colors" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ti ti-logout text-base"></i> Sign Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                </div>
            </div>
        </div>
    </header>

    {{-- ===== MAIN LAYOUT ===== --}}
    <div class="flex flex-1 overflow-hidden">

        {{-- ===== PRODUCTS PANEL ===== --}}
        <section class="flex-1 flex flex-col overflow-hidden min-w-0">

            {{-- Toolbar — stays pinned above the scrolling product grid --}}
            <div class="flex-none px-3 sm:px-4 pt-3 pb-2.5 bg-gray-100/95 dark:bg-gray-950/95 backdrop-blur-sm border-b border-gray-200/60 dark:border-gray-800/60">
                {{-- Search with Alpine-driven instant clear button --}}
                <div
                    x-data="{ hasSearch: {{ $search ? 'true' : 'false' }} }"
                    class="relative mb-2.5"
                >
                    <i class="ti ti-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm pointer-events-none"></i>
                    <input
                        type="text"
                        wire:model.live.debounce.400ms="search"
                        @input="hasSearch = $event.target.value.length > 0"
                        placeholder="Search products..."
                        class="w-full pl-9 pr-10 py-2.5 rounded-xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus:border-transparent transition-all shadow-sm"
                    >
                    <button
                        x-show="hasSearch"
                        x-cloak
                        @click="hasSearch = false; $wire.set('search', '')"
                        aria-label="Clear search"
                        class="absolute right-2.5 top-1/2 -translate-y-1/2 w-6 h-6 flex items-center justify-center rounded-full text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500"
                    >
                        <i class="ti ti-x text-sm"></i>
                    </button>
                </div>

                {{-- Category tabs --}}
                <div class="flex gap-1.5 overflow-x-auto pb-0.5 scrollbar-none">
                    <button wire:click="setCategory(null)" class="flex-none px-3 py-2 sm:py-1.5 rounded-lg text-xs font-semibold transition-all whitespace-nowrap focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 {{ $activeCategory === null ? 'bg-indigo-600 text-white shadow-sm' : 'bg-white dark:bg-gray-800/80 text-gray-600 dark:text-gray-400 border border-gray-200 dark:border-gray-700 hover:border-indigo-300' }}">All</button>
                    @foreach($this->categories as $cat)
                        <button wire:click="setCategory('{{ $cat->slug }}')" class="flex-none px-3 py-2 sm:py-1.5 rounded-lg text-xs font-semibold transition-all whitespace-nowrap focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 {{ $activeCategory === $cat->slug ? 'bg-indigo-600 text-white shadow-sm' : 'bg-white dark:bg-gray-800/80 text-gray-600 dark:text-gray-400 border border-gray-200 dark:border-gray-700 hover:border-indigo-300' }}">{{ $cat->name }}</button>
                    @endforeach
                </div>
            </div>

            {{-- Product grid — extra bottom padding on mobile for the FAB --}}
            <div class="flex-1 overflow-y-auto pos-products-scroll px-3 sm:px-4 pb-24 sm:pb-4">
                @if($this->filteredProducts->isEmpty())
                    <div class="flex flex-col items-center justify-center h-full text-center py-16">
                        <div class="w-14 h-14 rounded-2xl bg-gray-200 dark:bg-gray-800 flex items-center justify-center mb-3"><i class="ti ti-package-off text-2xl text-gray-400"></i></div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">No products found</p>
                        @if($search)<button wire:click="$set('search','')" class="mt-2 text-xs text-indigo-500 hover:text-indigo-700">Clear search</button>@endif
                    </div>
                @else
                    <div
                        class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-2 sm:gap-3"
                        wire:loading.class="opacity-50 pointer-events-none"
                        wire:target="search, setCategory"
                    >
                        @foreach($this->filteredProducts as $product)
                            @php
                                $outOfStock = $product->qty <= 0;
                                $lowStock   = $product->qty > 0 && $product->qty <= 5;
                                $inCartQty  = $this->cartProductQtys[$product->id] ?? 0;
                                $inCart     = $inCartQty > 0;
                            @endphp
                            <button
                                wire:key="product-{{ $product->id }}"
                                @if(!$outOfStock)
                                    @click="localCartQtys[{{ $product->id }}] = (localCartQtys[{{ $product->id }}] ?? 0) + 1; $wire.addToCart({{ $product->id }})"
                                @endif
                                {{ $outOfStock ? 'disabled' : '' }}
                                :class="(localCartQtys[{{ $product->id }}] ?? 0) > 0
                                    ? 'bg-indigo-50 dark:bg-indigo-950/60 border-indigo-400 dark:border-indigo-500 shadow-indigo-100 dark:shadow-indigo-900/20 shadow-md ring-1 ring-indigo-300 dark:ring-indigo-600/50'
                                    : 'bg-white dark:bg-gray-900 border-gray-200 dark:border-gray-800 hover:border-indigo-400 dark:hover:border-indigo-600 hover:shadow-md'"
                                class="product-card group text-left rounded-xl border overflow-hidden transition-all shadow-sm relative focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-1
                                    {{ $outOfStock ? 'opacity-60 cursor-not-allowed bg-white dark:bg-gray-900 border-gray-200 dark:border-gray-800' : '' }}"
                            >
                                {{-- In-cart badge (top-left) — driven by Alpine localCartQtys for instant feedback --}}
                                <div
                                    x-show="(localCartQtys[{{ $product->id }}] ?? 0) > 0"
                                    x-cloak
                                    class="absolute top-1.5 left-1.5 z-10 flex items-center gap-1 px-1.5 py-0.5 rounded-full bg-indigo-600 text-white text-[9px] font-bold shadow-sm"
                                >
                                    <i class="ti ti-shopping-cart text-[9px]"></i>
                                    <span x-text="localCartQtys[{{ $product->id }}] ?? 0"></span>
                                </div>

                                <div class="relative aspect-square overflow-hidden bg-gray-100 dark:bg-gray-800">
                                    <x-product-image
                                        :product="$product"
                                        size="thumb"
                                        :imgClass="$outOfStock ? '' : 'group-hover:scale-105 transition-transform duration-200'"
                                    />

                                    @if($outOfStock)
                                        <div class="absolute inset-0 bg-gray-900/50 flex items-center justify-center z-10">
                                            <span class="text-[10px] font-bold text-white bg-gray-800/80 px-2 py-1 rounded-full">OUT OF STOCK</span>
                                        </div>
                                    @elseif($lowStock && !$inCart)
                                        <div class="absolute top-1.5 right-1.5 z-10">
                                            <span class="text-[9px] font-bold text-white bg-amber-500 px-1.5 py-0.5 rounded-full">{{ $product->qty }} left</span>
                                        </div>
                                    @endif
                                </div>
                                <div
                                    class="p-2"
                                    :class="(localCartQtys[{{ $product->id }}] ?? 0) > 0 ? 'bg-indigo-50/80 dark:bg-indigo-950/40' : ''"
                                >
                                    <p
                                        class="text-[11px] font-semibold truncate leading-snug mb-1"
                                        :class="(localCartQtys[{{ $product->id }}] ?? 0) > 0 ? 'text-indigo-900 dark:text-indigo-100' : 'text-gray-900 dark:text-gray-100'"
                                    >{{ $product->name }}</p>
                                    <div class="flex items-center justify-between">
                                        <span
                                            class="text-xs font-bold"
                                            :class="(localCartQtys[{{ $product->id }}] ?? 0) > 0 ? 'text-indigo-600 dark:text-indigo-400' : 'text-emerald-600 dark:text-emerald-400'"
                                        >KES {{ number_format($product->price) }}</span>
                                        <span
                                            class="text-[9px]"
                                            :class="(localCartQtys[{{ $product->id }}] ?? 0) > 0 ? 'text-indigo-400 dark:text-indigo-500' : 'text-gray-400'"
                                        >{{ $product->qty }} pcs</span>
                                    </div>
                                </div>
                            </button>
                        @endforeach
                    </div>

                    @if($this->filteredProducts->hasPages())
                        <div class="mt-4 pb-2">
                            {{ $this->filteredProducts->links() }}
                        </div>
                    @endif
                @endif
            </div>
        </section>

        {{-- ===== CART SIDEBAR (desktop only) ===== --}}
        <aside class="hidden lg:flex flex-none w-80 xl:w-[360px] flex-col bg-white dark:bg-gray-900 border-l border-gray-200 dark:border-gray-800">
            @include('livewire.partials.cart-panel')
        </aside>
    </div>

    {{-- ===== MOBILE CART FAB ===== --}}
    <div class="lg:hidden fixed bottom-5 right-5 z-40">
        <button
            @click="showMobileCart = true"
            aria-label="Open cart"
            class="relative w-14 h-14 rounded-full bg-indigo-600 hover:bg-indigo-700 active:scale-95 text-white shadow-xl shadow-indigo-600/40 flex items-center justify-center transition-all focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-indigo-500 focus-visible:ring-offset-2"
        >
            <i class="ti ti-shopping-cart text-2xl"></i>
            {{-- Badge driven by Alpine localCartCount for instant update --}}
            <template x-if="localCartCount > 0">
                <span
                    x-text="localCartCount > 9 ? '9+' : localCartCount"
                    class="absolute -top-1 -right-1 min-w-[20px] h-5 px-1 rounded-full bg-rose-500 text-white text-[10px] font-bold flex items-center justify-center ring-2 ring-white dark:ring-gray-950"
                ></span>
            </template>
        </button>
    </div>

    {{-- ===== MOBILE CART BOTTOM SHEET ===== --}}
    <div
        x-show="showMobileCart"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="lg:hidden fixed inset-0 z-50 flex flex-col justify-end"
        @keydown.escape.window="showMobileCart = false"
    >
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="showMobileCart = false"></div>
        <div
            x-show="showMobileCart"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-y-full"
            x-transition:enter-end="translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-y-0"
            x-transition:leave-end="translate-y-full"
            class="relative flex flex-col bg-white dark:bg-gray-900 rounded-t-2xl max-h-[92vh] overflow-hidden"
        >
            {{-- Drag handle --}}
            <div class="flex-none flex items-center justify-center pt-3 pb-1">
                <div class="w-10 h-1 rounded-full bg-gray-300 dark:bg-gray-700"></div>
            </div>
            <div class="flex items-center justify-between px-4 py-2 flex-none border-b border-gray-100 dark:border-gray-800">
                <div>
                    <h3 class="font-bold text-gray-900 dark:text-white text-sm leading-tight">Your Cart</h3>
                    <p class="text-[10px] text-gray-400" x-text="localCartCount > 0 ? localCartCount + ' item' + (localCartCount !== 1 ? 's' : '') : 'Empty'"></p>
                </div>
                <button
                    @click="showMobileCart = false"
                    aria-label="Close cart"
                    class="w-11 h-11 rounded-xl flex items-center justify-center text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500"
                >
                    <i class="ti ti-x text-base"></i>
                </button>
            </div>
            {{-- flex-col so cart-panel's internal flex-none / flex-1 sections lay out correctly --}}
            <div class="flex-1 overflow-hidden flex flex-col">
                @include('livewire.partials.cart-panel')
            </div>
        </div>
    </div>

    {{-- ========== MODALS ========== --}}

    {{-- Customer Modal --}}
    <div x-show="showCustomerModal" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-end sm:items-center justify-center p-0 sm:p-4" @keydown.escape.window="showCustomerModal = false">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="showCustomerModal = false"></div>
        <div x-show="showCustomerModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:scale-95" class="relative w-full sm:max-w-md bg-white dark:bg-gray-900 rounded-t-2xl sm:rounded-2xl shadow-2xl border-0 sm:border border-gray-100 dark:border-gray-800 overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100 dark:border-gray-800">
                <h3 class="font-bold text-gray-900 dark:text-white">New Customer</h3>
                <button @click="showCustomerModal = false" aria-label="Close" class="w-11 h-11 rounded-xl flex items-center justify-center text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500"><i class="ti ti-x text-sm"></i></button>
            </div>
            <div class="px-5 py-4 space-y-3.5">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1.5">Name <span class="text-rose-500">*</span></label>
                    <input wire:model="customerName" type="text" placeholder="Full name" class="w-full px-3 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    @error('customerName') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1.5">Phone</label>
                        <input wire:model="customerPhone" type="tel" placeholder="07xx xxx xxx" class="w-full px-3 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1.5">Birth Date</label>
                        <input wire:model="customerBirthday" type="date" class="w-full px-3 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 dark:text-gray-400 mb-1.5">Email</label>
                    <input wire:model="customerEmail" type="email" placeholder="email@example.com" class="w-full px-3 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    @error('customerEmail') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="flex gap-2.5 px-5 pb-5">
                <button @click="showCustomerModal = false" class="flex-1 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700 text-sm font-semibold text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">Cancel</button>
                <button wire:click="createCustomer" class="flex-1 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm transition-colors">
                    <span wire:loading.remove wire:target="createCustomer">Create</span>
                    <span wire:loading wire:target="createCustomer">Saving…</span>
                </button>
            </div>
        </div>
    </div>

    {{-- Payment Modal --}}
    <div x-show="showPaymentModal" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-end sm:items-center justify-center p-0 sm:p-4" @keydown.escape.window="showPaymentModal = false">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="showPaymentModal = false"></div>
        <div x-show="showPaymentModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:scale-95" class="relative w-full sm:max-w-sm bg-white dark:bg-gray-900 rounded-t-2xl sm:rounded-2xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-br from-emerald-600 to-teal-700 px-5 py-4 text-white">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-emerald-200 text-xs font-medium mb-0.5">Order Total</p>
                        <p class="text-2xl font-black">{{ $this->cartTotal }}</p>
                    </div>
                    <button @click="showPaymentModal = false" aria-label="Close" class="w-11 h-11 rounded-xl flex items-center justify-center bg-white/20 hover:bg-white/30 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white/60"><i class="ti ti-x text-sm"></i></button>
                </div>
            </div>
            <div class="px-5 py-4">
                <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 dark:text-gray-500 mb-3">Select Payment Method</p>
                <div class="space-y-2">
                    @foreach([
                        ['value'=>'cash',    'label'=>'Cash',           'icon'=>'ti-cash',          'color'=>'emerald'],
                        ['value'=>'card',    'label'=>'Credit/Debit Card','icon'=>'ti-credit-card',  'color'=>'blue'],
                        ['value'=>'points',  'label'=>'M-PESA',         'icon'=>'ti-device-mobile', 'color'=>'green'],
                        ['value'=>'cheque',  'label'=>'Cheque',         'icon'=>'ti-writing',       'color'=>'amber'],
                        ['value'=>'deposit', 'label'=>'Bank Deposit',   'icon'=>'ti-building-bank', 'color'=>'violet'],
                    ] as $m)
                        <button @click="selectPayment('{{ $m['value'] }}')" :class="paymentMethod==='{{ $m['value'] }}' ? 'border-indigo-500 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300 shadow-sm' : 'border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 hover:border-gray-300'" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl border-2 text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500">
                            <i class="ti {{ $m['icon'] }} text-xl"></i>
                            {{ $m['label'] }}
                            <i x-show="paymentMethod==='{{ $m['value'] }}'" class="ti ti-circle-check ml-auto text-indigo-500 text-lg"></i>
                        </button>
                    @endforeach
                </div>
                @if($errorMessage)
                    <div class="mt-3 flex items-center gap-2 px-3 py-2 rounded-xl bg-rose-50 dark:bg-rose-900/20 border border-rose-200 dark:border-rose-800 text-xs text-rose-600 dark:text-rose-400"><i class="ti ti-alert-circle"></i> {{ $errorMessage }}</div>
                @endif
            </div>
            <div class="flex gap-2.5 px-5 pb-5">
                <button @click="showPaymentModal = false" class="flex-1 py-3 rounded-xl border border-gray-200 dark:border-gray-700 text-sm font-semibold text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">Cancel</button>
                <button
                    wire:click="checkout"
                    wire:loading.attr="disabled"
                    wire:target="checkout"
                    :disabled="!paymentMethod"
                    :class="paymentMethod ? 'bg-emerald-600 hover:bg-emerald-700 shadow-lg shadow-emerald-600/25' : 'bg-gray-200 dark:bg-gray-700 cursor-not-allowed text-gray-400'"
                    class="flex-1 py-3 rounded-xl text-white font-bold text-sm transition-all disabled:opacity-70 disabled:cursor-not-allowed"
                >
                    <span wire:loading.remove wire:target="checkout">Confirm &amp; Pay</span>
                    <span wire:loading wire:target="checkout" class="flex items-center justify-center gap-1.5"><svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>Processing…</span>
                </button>
            </div>
        </div>
    </div>

    {{-- Today's Sales Modal --}}
    <div x-show="showSalesModal" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-end sm:items-center justify-center p-0 sm:p-4" @keydown.escape.window="showSalesModal = false">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="showSalesModal = false"></div>
        <div x-show="showSalesModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:scale-95" class="relative w-full sm:max-w-md max-h-[88vh] flex flex-col bg-white dark:bg-gray-900 rounded-t-2xl sm:rounded-2xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-br from-emerald-600 to-teal-700 px-5 py-5 text-white flex-none">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <p class="text-emerald-200 text-xs font-medium mb-1">{{ now()->format('D, d M Y') }}</p>
                        <h3 class="font-black text-xl">Today's Sales</h3>
                    </div>
                    <button @click="showSalesModal = false" aria-label="Close" class="w-11 h-11 rounded-xl bg-white/20 hover:bg-white/30 flex items-center justify-center transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white/60"><i class="ti ti-x text-sm"></i></button>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="bg-white/15 rounded-xl p-3">
                        <p class="text-emerald-100 text-[10px] font-semibold uppercase tracking-wider mb-1">Revenue</p>
                        <p class="text-xl font-black">KES {{ number_format($this->todaysSales['revenue']) }}</p>
                    </div>
                    <div class="bg-white/15 rounded-xl p-3">
                        <p class="text-emerald-100 text-[10px] font-semibold uppercase tracking-wider mb-1">Orders</p>
                        <p class="text-xl font-black">{{ $this->todaysSales['order_count'] }}</p>
                    </div>
                </div>
            </div>
            <div class="flex-1 overflow-y-auto px-5 py-4 space-y-4">
                {{-- Status breakdown --}}
                @if($this->todaysSales['order_count'] > 0)
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-2">By Status</p>
                        <div class="grid grid-cols-3 gap-2">
                            @foreach([['new','blue','New'],['processing','amber','Processing'],['delivered','emerald','Delivered']] as [$s,$c,$l])
                                <div class="bg-{{ $c }}-50 dark:bg-{{ $c }}-900/20 border border-{{ $c }}-200 dark:border-{{ $c }}-800/50 rounded-xl p-3 text-center">
                                    <p class="text-xl font-black text-{{ $c }}-600 dark:text-{{ $c }}-400">{{ $this->todaysSales['by_status'][$s] ?? 0 }}</p>
                                    <p class="text-[10px] font-semibold text-{{ $c }}-600 dark:text-{{ $c }}-400">{{ $l }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- Payment breakdown --}}
                    @if($this->todaysSales['payment_breakdown']->isNotEmpty())
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-2">Payment Methods</p>
                            <div class="space-y-2">
                                @foreach($this->todaysSales['payment_breakdown'] as $p)
                                    <div class="flex items-center justify-between px-3.5 py-2.5 bg-gray-50 dark:bg-gray-800 rounded-xl">
                                        <span class="text-sm font-semibold text-gray-700 dark:text-gray-300 capitalize">{{ $p->method }}</span>
                                        <div class="text-right">
                                            <p class="text-sm font-bold text-emerald-600 dark:text-emerald-400">KES {{ number_format($p->total) }}</p>
                                            <p class="text-[10px] text-gray-400">{{ $p->count }} {{ Str::plural('order', $p->count) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    {{-- Recent orders --}}
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-2">Recent Orders</p>
                        <div class="space-y-2">
                            @foreach($this->todaysOrders->take(8) as $order)
                                <div class="flex items-center gap-3 px-3.5 py-2.5 bg-gray-50 dark:bg-gray-800 rounded-xl">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xs font-bold text-gray-900 dark:text-white">#{{ $order->number }}</p>
                                        <p class="text-[10px] text-gray-400 truncate">{{ $order->customer?->name ?? 'Walk-in' }} · {{ $order->created_at->format('H:i') }}</p>
                                    </div>
                                    <span class="text-xs font-bold text-emerald-600 dark:text-emerald-400 whitespace-nowrap">KES {{ number_format($order->total_price) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center py-12 text-center">
                        <div class="w-14 h-14 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center mb-3"><i class="ti ti-chart-bar text-2xl text-gray-300 dark:text-gray-600"></i></div>
                        <p class="text-sm text-gray-400">No sales yet today</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Saved Carts Modal --}}
    <div x-show="showSavedCartsModal" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-end sm:items-center justify-center p-0 sm:p-4" @keydown.escape.window="showSavedCartsModal = false">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="showSavedCartsModal = false"></div>
        <div x-show="showSavedCartsModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:scale-95" class="relative w-full sm:max-w-md max-h-[88vh] flex flex-col bg-white dark:bg-gray-900 rounded-t-2xl sm:rounded-2xl shadow-2xl overflow-hidden" x-data="{ savedSearch: '' }">
            <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100 dark:border-gray-800 flex-none">
                <div>
                    <h3 class="font-bold text-gray-900 dark:text-white">Saved Carts</h3>
                    <p class="text-[11px] text-gray-400 mt-0.5">{{ $this->savedCarts->count() }} saved</p>
                </div>
                <button @click="showSavedCartsModal = false" aria-label="Close" class="w-11 h-11 rounded-xl flex items-center justify-center text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500"><i class="ti ti-x text-sm"></i></button>
            </div>
            {{-- Search saved carts --}}
            <div class="flex-none px-4 py-2.5 border-b border-gray-100 dark:border-gray-800">
                <div class="relative">
                    <i class="ti ti-search absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-400 text-xs pointer-events-none"></i>
                    <input x-model="savedSearch" type="text" placeholder="Search saved carts…" class="w-full pl-7 pr-3 py-1.5 rounded-lg bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-xs text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>
            <div class="flex-1 overflow-y-auto p-4 space-y-2">
                @forelse($this->savedCarts as $saved)
                    <div wire:key="saved-{{ $saved->id }}" data-name="{{ Str::lower($saved->name) }}" x-show="!savedSearch || $el.dataset.name.includes(savedSearch.toLowerCase())" class="flex items-center gap-3 p-3.5 bg-gray-50 dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700">
                        <div class="w-9 h-9 rounded-lg bg-indigo-100 dark:bg-indigo-900/40 flex items-center justify-center flex-none">
                            <i class="ti ti-shopping-cart text-base text-indigo-600 dark:text-indigo-400"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-bold text-gray-900 dark:text-white truncate">{{ $saved->name }}</p>
                            <p class="text-[10px] text-gray-400">{{ $saved->item_count }} items · KES {{ number_format($saved->total) }}{{ $saved->customer ? ' · '.$saved->customer->name : '' }}</p>
                            <p class="text-[10px] text-gray-400 dark:text-gray-500">{{ $saved->created_at->format('M j, H:i') }} · <span class="text-gray-300 dark:text-gray-600">{{ $saved->created_at->diffForHumans() }}</span></p>
                        </div>
                        <div class="flex items-center gap-1.5 flex-none">
                            <button wire:click="restoreCart({{ $saved->id }})" class="px-3 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-semibold transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-1">Load</button>
                            <button wire:click="deleteSavedCart({{ $saved->id }})" wire:confirm="Delete this saved cart?" aria-label="Delete saved cart" class="w-11 h-11 rounded-xl flex items-center justify-center text-gray-400 hover:bg-rose-100 dark:hover:bg-rose-900/30 hover:text-rose-500 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-rose-500">
                                <i class="ti ti-trash text-xs"></i>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="flex flex-col items-center justify-center py-12 text-center">
                        <div class="w-14 h-14 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center mb-3"><i class="ti ti-shopping-cart-off text-2xl text-gray-300 dark:text-gray-600"></i></div>
                        <p class="text-sm font-medium text-gray-400">No saved carts</p>
                        <p class="text-xs text-gray-300 dark:text-gray-600 mt-1">Save your current cart to come back to it later</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Save Cart Modal --}}
    <div x-show="showSaveCartModal" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center p-4" @keydown.escape.window="showSaveCartModal = false">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="showSaveCartModal = false"></div>
        <div x-show="showSaveCartModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="relative w-full max-w-sm bg-white dark:bg-gray-900 rounded-2xl shadow-2xl border border-gray-100 dark:border-gray-800 p-5">
            <h3 class="font-bold text-gray-900 dark:text-white mb-1">Save Cart</h3>
            <p class="text-xs text-gray-400 mb-4">Give this cart a name so you can find it later.</p>
            <input wire:model="saveCartName" type="text" placeholder="e.g. Table 5, Hold Order" class="w-full px-3 py-2.5 rounded-xl bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 mb-4">
            <div class="flex gap-2.5">
                <button @click="showSaveCartModal = false" class="flex-1 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700 text-sm font-semibold text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">Cancel</button>
                <button
                    wire:click="saveCart"
                    wire:loading.attr="disabled"
                    wire:target="saveCart"
                    class="flex-1 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-sm transition-colors disabled:opacity-70 disabled:cursor-not-allowed"
                >
                    <span wire:loading.remove wire:target="saveCart">Save Cart</span>
                    <span wire:loading wire:target="saveCart">Saving…</span>
                </button>
            </div>
        </div>
    </div>

    {{-- Reset Confirm --}}
    <div x-show="showResetModal" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center p-4" @keydown.escape.window="showResetModal = false">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="showResetModal = false"></div>
        <div x-show="showResetModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="relative w-full max-w-xs bg-white dark:bg-gray-900 rounded-2xl shadow-2xl border border-gray-100 dark:border-gray-800 p-5 text-center">
            <div class="w-12 h-12 rounded-full bg-rose-100 dark:bg-rose-900/30 flex items-center justify-center mx-auto mb-3"><i class="ti ti-trash text-xl text-rose-500"></i></div>
            <h3 class="font-bold text-gray-900 dark:text-white mb-1">Clear Cart?</h3>
            <p class="text-xs text-gray-400 mb-4">All items will be removed from the current order.</p>
            <div class="flex gap-2.5">
                <button @click="showResetModal = false" class="flex-1 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700 text-sm font-semibold text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">Cancel</button>
                <button wire:click="clearCart" class="flex-1 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-700 text-white font-bold text-sm transition-colors">Clear</button>
            </div>
        </div>
    </div>

</div>
