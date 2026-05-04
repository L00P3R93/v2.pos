{{-- =============================================
     CART PANEL — shared by desktop sidebar & mobile sheet
     ============================================= --}}

{{-- ── SECTION 1: Customer (Indigo accent) ── --}}
<div class="flex-none bg-gradient-to-b from-indigo-600/8 to-transparent dark:from-indigo-900/20 dark:to-transparent border-b border-indigo-100 dark:border-indigo-900/30 px-4 pt-4 pb-3">
    <div class="flex items-center justify-between mb-3">
        <div class="flex items-center gap-2">
            <div class="w-7 h-7 rounded-lg bg-indigo-600 flex items-center justify-center">
                <i class="ti ti-receipt text-xs text-white"></i>
            </div>
            <h2 class="font-bold text-sm text-gray-900 dark:text-white">New Order</h2>
            @if($this->cartCount > 0)
                <span class="px-1.5 py-0.5 rounded-full text-[10px] font-bold bg-indigo-100 dark:bg-indigo-900/60 text-indigo-700 dark:text-indigo-300">{{ $this->cartCount }}</span>
            @endif
        </div>
        <button @click="showCustomerModal = true" class="flex items-center gap-1 px-2 py-1.5 text-[11px] font-semibold rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white transition-colors">
            <i class="ti ti-user-plus text-xs"></i><span class="hidden sm:inline">New</span>
        </button>
    </div>

    {{-- Custom searchable customer dropdown --}}
    @php
        $customerList = $this->customers->map(fn($c) => ['id' => $c->id, 'name' => $c->name, 'phone' => $c->phone ?? '']);
    @endphp
    <div
        x-data="{
            open: false,
            search: '',
            selectedId: @entangle('selectedCustomerId').live,
            customers: @js($customerList),
            get filtered() {
                if (!this.search) return this.customers;
                const q = this.search.toLowerCase();
                return this.customers.filter(c =>
                    c.name.toLowerCase().includes(q) || (c.phone && c.phone.includes(q))
                );
            },
            get label() {
                if (!this.selectedId) return 'Walk-in Customer';
                const c = this.customers.find(c => c.id == this.selectedId);
                return c ? (c.name + (c.phone ? ' · ' + c.phone : '')) : 'Walk-in Customer';
            },
            select(id) {
                this.selectedId = id;
                this.search = '';
                this.open = false;
            }
        }"
        @click.outside="open = false"
        class="relative"
    >
        {{-- Trigger --}}
        <button
            type="button"
            @click="open = !open"
            class="w-full flex items-center gap-2 pl-3 pr-2.5 py-2 rounded-lg bg-white dark:bg-gray-800 border border-indigo-200 dark:border-indigo-900/60 text-xs text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm cursor-pointer"
        >
            <i class="ti ti-users text-indigo-400 text-sm flex-none"></i>
            <span x-text="label" class="flex-1 text-left truncate"></span>
            <i class="ti ti-chevron-down text-gray-400 text-xs flex-none transition-transform" :class="open && 'rotate-180'"></i>
        </button>

        {{-- Dropdown --}}
        <div
            x-show="open"
            x-cloak
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0 -translate-y-1"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-1"
            class="absolute left-0 right-0 top-full mt-1 z-30 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-xl overflow-hidden"
            style="max-height: 260px; display: flex; flex-direction: column;"
        >
            {{-- Search input --}}
            <div class="flex-none p-2 border-b border-gray-100 dark:border-gray-700">
                <div class="relative">
                    <i class="ti ti-search absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-400 text-xs pointer-events-none"></i>
                    <input
                        x-model="search"
                        @click.stop
                        type="text"
                        placeholder="Search name or phone…"
                        class="w-full pl-7 pr-3 py-1.5 rounded-lg bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 text-xs text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                </div>
            </div>

            {{-- Options list --}}
            <div class="overflow-y-auto" style="flex: 1; min-height: 0;">
                {{-- Walk-in option --}}
                <button
                    type="button"
                    @click="select(null)"
                    :class="!selectedId ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300 font-semibold' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700'"
                    class="w-full flex items-center gap-2 px-3 py-2 text-xs transition-colors text-left"
                >
                    <i class="ti ti-walk text-sm flex-none"></i>
                    <span>Walk-in Customer</span>
                </button>

                {{-- Filtered customers --}}
                <template x-for="c in filtered" :key="c.id">
                    <button
                        type="button"
                        @click="select(c.id)"
                        :class="selectedId == c.id ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300 font-semibold' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700'"
                        class="w-full flex flex-col px-3 py-2 text-xs transition-colors text-left"
                    >
                        <span x-text="c.name" class="font-medium leading-tight"></span>
                        <span x-text="c.phone" x-show="c.phone" class="text-gray-400 text-[10px]"></span>
                    </button>
                </template>

                {{-- Empty state --}}
                <div x-show="filtered.length === 0" class="flex flex-col items-center py-4 text-center text-gray-400">
                    <i class="ti ti-users-off text-lg mb-1"></i>
                    <p class="text-[11px]">No customers found</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Feedback --}}
    @if($successMessage)
        <div class="mt-2 flex items-center gap-2 px-2.5 py-2 rounded-lg bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 text-[11px] text-emerald-700 dark:text-emerald-400">
            <i class="ti ti-circle-check text-sm flex-none"></i>
            <span class="flex-1">{{ $successMessage }}</span>
            <button wire:click="$set('successMessage', null)" class="flex-none text-emerald-400 hover:text-emerald-600 transition-colors"><i class="ti ti-x text-xs"></i></button>
        </div>
    @endif
    @if($errorMessage)
        <div class="mt-2 flex items-center gap-2 px-2.5 py-2 rounded-lg bg-rose-50 dark:bg-rose-900/20 border border-rose-200 dark:border-rose-800 text-[11px] text-rose-700 dark:text-rose-400">
            <i class="ti ti-alert-circle text-sm flex-none"></i>
            <span class="flex-1">{{ $errorMessage }}</span>
            <button wire:click="$set('errorMessage', null)" class="flex-none text-rose-400 hover:text-rose-600 transition-colors"><i class="ti ti-x text-xs"></i></button>
        </div>
    @endif
</div>

{{-- ── SECTION 2: Cart Items ── --}}
@if($this->cartCount === 0)
    <div class="flex-1 flex flex-col items-center justify-center text-center py-10 px-6">
        <div class="w-16 h-16 rounded-2xl bg-gray-100 dark:bg-gray-800 flex items-center justify-center mb-3">
            <i class="ti ti-shopping-cart text-3xl text-gray-300 dark:text-gray-600"></i>
        </div>
        <p class="text-sm font-semibold text-gray-400 dark:text-gray-500">Cart is empty</p>
        <p class="text-xs text-gray-300 dark:text-gray-600 mt-1">Tap a product to add it</p>
    </div>
@else
    <div class="flex-1 overflow-y-auto cart-scroll bg-white dark:bg-gray-900">
        @foreach($this->cartItems as $item)
            <div wire:key="ci-{{ $item->getHash() }}" class="flex items-center gap-2.5 px-4 py-2.5 border-b border-gray-50 dark:border-gray-800/80 hover:bg-gray-50/70 dark:hover:bg-gray-800/30 transition-colors">
                {{-- Color indicator dot --}}
                <div class="w-1.5 h-8 rounded-full bg-indigo-400 dark:bg-indigo-600 flex-none opacity-60"></div>

                <div class="flex-1 min-w-0">
                    <p class="text-[12px] font-semibold text-gray-900 dark:text-gray-100 truncate leading-tight">{{ $item->name }}</p>
                    <p class="text-[10px] text-gray-400 dark:text-gray-500">KES {{ number_format($item->price) }}</p>
                </div>

                {{-- Qty controls --}}
                <div class="flex items-center gap-1 flex-none">
                    <button wire:click="decrementItem('{{ $item->getHash() }}', {{ (int)$item->qty }})" class="w-6 h-6 rounded-md flex items-center justify-center bg-gray-100 dark:bg-gray-800 text-gray-500 hover:bg-rose-100 dark:hover:bg-rose-900/40 hover:text-rose-500 transition-colors">
                        <i class="ti ti-minus text-[10px]"></i>
                    </button>
                    <span class="w-6 text-center text-xs font-black text-gray-900 dark:text-gray-100">{{ (int)$item->qty }}</span>
                    <button wire:click="incrementItem('{{ $item->getHash() }}', {{ (int)$item->qty }})" class="w-6 h-6 rounded-md flex items-center justify-center bg-gray-100 dark:bg-gray-800 text-gray-500 hover:bg-indigo-100 dark:hover:bg-indigo-900/40 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                        <i class="ti ti-plus text-[10px]"></i>
                    </button>
                </div>

                {{-- Line total --}}
                <span class="w-16 text-right text-xs font-bold text-gray-800 dark:text-gray-200 flex-none">{{ number_format($item->qty * $item->price) }}</span>

                {{-- Remove — always visible --}}
                <button wire:click="removeItem('{{ $item->getHash() }}')" class="w-7 h-7 rounded-md flex items-center justify-center text-rose-400 dark:text-rose-500 hover:bg-rose-100 dark:hover:bg-rose-900/30 hover:text-rose-600 transition-colors flex-none">
                    <i class="ti ti-trash text-xs"></i>
                </button>
            </div>
        @endforeach
    </div>
@endif

@if($this->cartCount > 0)
    {{-- ── SECTION 3: Totals (Dark) ── --}}
    <div class="flex-none bg-gray-800 dark:bg-gray-950 px-4 py-3">
        <div class="space-y-1.5 mb-2">
            <div class="flex justify-between text-[11px] text-gray-400">
                <span>Subtotal</span><span>{{ $this->cartSubtotal }}</span>
            </div>
            <div class="flex justify-between text-[11px] text-gray-500">
                <span>Tax</span><span>—</span>
            </div>
            <div class="flex justify-between text-[11px] text-gray-500">
                <span>Discount</span><span>—</span>
            </div>
        </div>
        <div class="flex justify-between items-center pt-2 border-t border-dashed border-gray-700">
            <span class="text-sm font-bold text-white">Total</span>
            <span class="text-base font-black text-emerald-400">{{ $this->cartTotal }}</span>
        </div>
    </div>

    {{-- ── SECTION 4: Actions (Colorful) ── --}}
    <div class="flex-none bg-gray-50 dark:bg-gray-900/60 border-t border-b border-gray-100 dark:border-gray-800 px-4 py-3">
        <p class="text-[9px] font-bold uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-2">Quick Actions</p>
        <div class="grid grid-cols-4 gap-1.5">
            <button @click="showSavedCartsModal = true" class="flex flex-col items-center gap-1 p-2 rounded-xl bg-violet-100 dark:bg-violet-900/30 hover:bg-violet-200 dark:hover:bg-violet-900/50 text-violet-700 dark:text-violet-400 transition-colors">
                <i class="ti ti-bookmark text-base"></i><span class="text-[9px] font-semibold">Saved</span>
            </button>
            <button @click="showSaveCartModal = true" class="flex flex-col items-center gap-1 p-2 rounded-xl bg-blue-100 dark:bg-blue-900/30 hover:bg-blue-200 dark:hover:bg-blue-900/50 text-blue-700 dark:text-blue-400 transition-colors">
                <i class="ti ti-device-floppy text-base"></i><span class="text-[9px] font-semibold">Save</span>
            </button>
            <button @click="showSalesModal = true" class="flex flex-col items-center gap-1 p-2 rounded-xl bg-emerald-100 dark:bg-emerald-900/30 hover:bg-emerald-200 dark:hover:bg-emerald-900/50 text-emerald-700 dark:text-emerald-400 transition-colors">
                <i class="ti ti-chart-bar text-base"></i><span class="text-[9px] font-semibold">Sales</span>
            </button>
            <button @click="showResetModal = true" class="flex flex-col items-center gap-1 p-2 rounded-xl bg-rose-100 dark:bg-rose-900/30 hover:bg-rose-200 dark:hover:bg-rose-900/50 text-rose-700 dark:text-rose-400 transition-colors">
                <i class="ti ti-trash text-base"></i><span class="text-[9px] font-semibold">Clear</span>
            </button>
        </div>
    </div>

    {{-- ── SECTION 5: Payment (Emerald) ── --}}
    <div class="flex-none bg-gradient-to-b from-emerald-50 to-teal-50 dark:from-emerald-950/30 dark:to-teal-950/20 border-t border-emerald-100 dark:border-emerald-900/30 px-4 py-3">
        <p class="text-[9px] font-bold uppercase tracking-widest text-emerald-600/70 dark:text-emerald-500/60 mb-2">Pay With</p>
        <div class="grid grid-cols-3 gap-1.5 mb-3">
            <button @click="showPaymentModal = true; selectPayment('cash')" class="flex flex-col items-center gap-1 p-2 rounded-xl bg-white dark:bg-gray-800 border-2 border-emerald-200 dark:border-emerald-900/50 hover:border-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 transition-all text-[10px] font-semibold shadow-sm">
                <i class="ti ti-cash text-lg"></i>Cash
            </button>
            <button @click="showPaymentModal = true; selectPayment('card')" class="flex flex-col items-center gap-1 p-2 rounded-xl bg-white dark:bg-gray-800 border-2 border-blue-200 dark:border-blue-900/50 hover:border-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 text-blue-700 dark:text-blue-400 transition-all text-[10px] font-semibold shadow-sm">
                <i class="ti ti-credit-card text-lg"></i>Card
            </button>
            <button @click="showPaymentModal = true; selectPayment('points')" class="flex flex-col items-center gap-1 p-2 rounded-xl bg-white dark:bg-gray-800 border-2 border-green-200 dark:border-green-900/50 hover:border-green-400 hover:bg-green-50 dark:hover:bg-green-900/30 text-green-700 dark:text-green-400 transition-all text-[10px] font-semibold shadow-sm">
                <i class="ti ti-device-mobile text-lg"></i>M-PESA
            </button>
        </div>
        <button @click="showPaymentModal = true" class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 active:scale-[0.98] text-white transition-all shadow-lg shadow-emerald-600/25 flex items-center">
            <i class="ti ti-cash-banknote text-lg mr-2 flex-none"></i>
            <span class="flex-1 text-center font-black text-sm">Pay {{ $this->cartTotal }}</span>
            <i class="ti ti-arrow-right text-base flex-none opacity-70"></i>
        </button>
    </div>
@else
    {{-- Empty state actions --}}
    <div class="flex-none border-t border-gray-100 dark:border-gray-800 px-4 py-3 space-y-2 bg-white dark:bg-gray-900">
        <button @click="showSavedCartsModal = true" class="w-full py-2.5 rounded-xl border border-violet-200 dark:border-violet-900/50 text-xs font-semibold text-violet-700 dark:text-violet-400 hover:bg-violet-50 dark:hover:bg-violet-900/20 transition-colors flex items-center justify-center gap-2">
            <i class="ti ti-bookmark text-sm"></i>View Saved Carts
        </button>
        <button @click="showSalesModal = true" class="w-full py-2.5 rounded-xl border border-emerald-200 dark:border-emerald-900/50 text-xs font-semibold text-emerald-700 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition-colors flex items-center justify-center gap-2">
            <i class="ti ti-chart-bar text-sm"></i>Today's Sales
        </button>
    </div>
@endif
