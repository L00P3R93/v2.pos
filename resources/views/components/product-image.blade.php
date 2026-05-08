@props([
    'product',
    'size' => 'card',
    'alt' => null,
    'imgClass' => '',
])

@php
    $dimensions = ['thumb' => 150, 'card' => 400, 'full' => 800];
    $dim        = $dimensions[$size] ?? 400;
    $alt        ??= $product->name;
    $webpUrl    = $product->getFirstMediaUrl('product-images', $size . '-webp');
    $baseUrl    = $product->getFirstMediaUrl('product-images', $size);
@endphp

<div {{ $attributes->merge(['class' => 'relative w-full h-full']) }}>
    {{-- CSS-only skeleton shown while image loads --}}
    <div class="absolute inset-0 bg-gray-200 dark:bg-gray-700 animate-pulse" aria-hidden="true"></div>

    @if($baseUrl)
        <picture class="absolute inset-0">
            @if($webpUrl)
                <source srcset="{{ $webpUrl }}" type="image/webp">
            @endif
            <img
                src="{{ $baseUrl }}"
                alt="{{ $alt }}"
                width="{{ $dim }}"
                height="{{ $dim }}"
                loading="lazy"
                decoding="async"
                class="w-full h-full object-cover {{ $imgClass }}"
            >
        </picture>
    @else
        <div class="absolute inset-0 flex items-center justify-center">
            <i class="ti ti-photo text-3xl text-gray-300 dark:text-gray-600" aria-hidden="true"></i>
        </div>
    @endif
</div>
