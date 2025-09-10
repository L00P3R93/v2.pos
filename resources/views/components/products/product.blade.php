<ul class="tabs owl-carousel pos-category3 mb-4">
    <li id="all" class="active">
        <a href="javascript:void(0);">
            <img src="{{ asset('assets/img/categories/category-01.svg') }}" alt="Categories">
        </a>
        <h6><a href="javascript:void(0);">All Categories</a></h6>
    </li>
    @foreach($categories as $category)
        <li id="{{ $category->slug }}">
            <a href="javascript:void(0);">
                <img src="{{ asset('assets/img/categories/category-0'.rand(2, 7).'.svg') }}" alt="Categories">
            </a>
            <h6><a href="javascript:void(0);">{{ $category->name }}</a></h6>
        </li>
    @endforeach
</ul>
<div class="pos-products">
    <div class="tabs_container">
        <div  class="tab_content active" data-tab="all">
            <div class="row row-cols-xxl-5 g-3">
                @foreach($allProducts as $product)
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl">
                        <div onclick="addToCart({{ $product->id }})" class="product-info card">
                            <a href="javascript:void(0);" class="product-image">
                                <img src="{{ $product->getFirstMediaUrl('product-images', 'thumb') }}" alt="Products">
                            </a>
                            <div class="product-content">
                                <h6 class="fs-14 fw-bold mb-1"><a href="javascript:void(0);">{{ $product->name }}</a></h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="text-teal fs-14 fw-bold">Kes {{ number_format($product->price) }}</h6>
                                    <p class="text-pink">{{ $product->qty }} Pcs</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @foreach($categories as $category)
            @php
            $products = $category->products()->where('is_visible', 1)->get();
            @endphp
            <div  class="tab_content" data-tab="{{ $category->slug }}">
                <div class="row row-cols-xxl-5 g-3">
                    @foreach($products as $product)
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl">
                            <div class="product-info card">
                                <a href="javascript:void(0);" class="product-image">
                                    <img src="{{ $product->getFirstMediaUrl('product-images') }}" alt="Products">
                                </a>
                                <div class="product-content">
                                    <h6 class="fs-14 fw-bold mb-1"><a href="javascript:void(0);">{{ $product->name }}</a></h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="text-teal fs-14 fw-bold">Kes {{ number_format($product->price) }}</h6>
                                        <p class="text-pink">{{ $product->qty }} Pcs</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
