@extends('layouts.app')

@section('title')
    <title>Home | POS</title>
@endsection

@section('style')
@endsection

@section('content')
    <div class="page-wrapper pos-pg-wrapper ms-0">
        <div class="content pos-design p-0">
            @include('layouts._message')
            <div class="row align-items-start pos-wrapper">
                <!-- Products -->
                <div class="col-md-12 col-lg-7 col-xl-8">
                    <div class="pos-categories tabs_wrapper">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
                            <div>
                                <p>{{ date('D, d M Y H:i:s') }}</p>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <div class="input-icon-start pos-search position-relative">
                                    <span class="input-icon-addon">
                                        <i class="ti ti-search"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Search Product">
                                </div>
                                <a href="#" class="btn btn-sm btn-primary">View All Categories</a>
                            </div>
                        </div>

                        @include('components.products.product')
                    </div>
                </div>
                <!-- /Products -->

                <!-- Order Details -->
                <div class="col-md-12 col-lg-5 col-xl-4 ps-0 theiaStickySidebar" id="cart_details">
                    @include('components.order.cart')
                </div>
                <!-- /Order Details -->
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
