<!-- Orders -->
<div class="modal fade pos-modal" id="orders" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Today's Orders</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tabs-sets">
                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="new-tab" data-bs-toggle="tab" data-bs-target="#new" type="button"   aria-controls="new" aria-selected="true" role="tab">New</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="processing-tab" data-bs-toggle="tab" data-bs-target="#processing" type="button"   aria-controls="processing" aria-selected="false" role="tab">Processing</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="delivered-tab" data-bs-toggle="tab" data-bs-target="#delivered" type="button"   aria-controls="delivered" aria-selected="false" role="tab">Delivered</button>
                        </li>
                    </ul>
                    <div class="tab-content" >
                        <div class="tab-pane fade show active" id="new" role="tabpanel" aria-labelledby="new-tab">
                            <div class="input-icon-start pos-search position-relative mb-3">
                                <span class="input-icon-addon">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Search Product">
                            </div>
                            <div class="order-body">
                                @php
                                $orders = auth()->user()->orders()->where('status', 'new')->whereDate('created_at', date('Y-m-d'))->limit(5)->get();
                                @endphp
                                @foreach($orders as $order)
                                    <div class="card bg-light mb-3">
                                        <div class="card-body">
                                            <span class="badge bg-dark fs-12 mb-2">Order ID : {{ $order->number }}</span>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <p class="fs-15 mb-1"><span class="fs-14 fw-bold text-gray-9">Cashier :</span> {{ $order->user->name }}</p>
                                                    <p class="fs-15"><span class="fs-14 fw-bold text-gray-9">Total :</span> KES {{ number_format($order->total_price) }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="fs-15 mb-1"><span class="fs-14 fw-bold text-gray-9">Customer :</span>  {{ $order->customer->name }}</p>
                                                    <p class="fs-15"><span class="fs-14 fw-bold text-gray-9">Date :</span> {{ $order->created_at->format('Y-m-d H:i') }}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center flex-wrap gap-2 mt-4">
                                                <a class="btn btn-md btn-orange">Open Order</a>
                                                <a class="btn btn-md btn-teal" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#products">View Products</a>
                                                <a class="btn btn-md btn-indigo">Print</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="processing" role="tabpanel" >
                            <div class="input-icon-start pos-search position-relative mb-3">
                                <span class="input-icon-addon">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Search Product">
                            </div>
                            <div class="order-body">
                                @php
                                    $orders = auth()->user()->orders()->where('status', 'processing')->whereDate('created_at', date('Y-m-d'))->limit(5)->get();
                                @endphp
                                @foreach($orders as $order)
                                    <div class="card bg-light mb-3">
                                        <div class="card-body">
                                            <span class="badge bg-dark fs-12 mb-2">Order ID : {{ $order->number }}</span>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <p class="fs-15 mb-1"><span class="fs-14 fw-bold text-gray-9">Cashier :</span> {{ $order->user->name }}</p>
                                                    <p class="fs-15"><span class="fs-14 fw-bold text-gray-9">Total :</span> KES {{ number_format($order->total_price) }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="fs-15 mb-1"><span class="fs-14 fw-bold text-gray-9">Customer :</span>  {{ $order->customer->name }}</p>
                                                    <p class="fs-15"><span class="fs-14 fw-bold text-gray-9">Date :</span> {{ $order->created_at->format('Y-m-d H:i') }}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center flex-wrap gap-2 mt-4">
                                                <a class="btn btn-md btn-orange">Open Order</a>
                                                <a class="btn btn-md btn-teal" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#products">View Products</a>
                                                <a class="btn btn-md btn-indigo">Print</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="delivered" role="tabpanel" >
                            <div class="input-icon-start pos-search position-relative mb-3">
                                <span class="input-icon-addon">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Search Product">
                            </div>
                            <div class="order-body">
                                @php
                                    $orders = auth()->user()->orders()->where('status', 'delivered')->whereDate('created_at', date('Y-m-d'))->limit(5)->get();
                                @endphp
                                @foreach($orders as $order)
                                    <div class="card bg-light mb-3">
                                        <div class="card-body">
                                            <span class="badge bg-dark fs-12 mb-2">Order ID : {{ $order->number }}</span>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <p class="fs-15 mb-1"><span class="fs-14 fw-bold text-gray-9">Cashier :</span> {{ $order->user->name }}</p>
                                                    <p class="fs-15"><span class="fs-14 fw-bold text-gray-9">Total :</span> KES {{ number_format($order->total_price) }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="fs-15 mb-1"><span class="fs-14 fw-bold text-gray-9">Customer :</span>  {{ $order->customer->name }}</p>
                                                    <p class="fs-15"><span class="fs-14 fw-bold text-gray-9">Date :</span> {{ $order->created_at->format('Y-m-d H:i') }}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center flex-wrap gap-2 mt-4">
                                                <a class="btn btn-md btn-orange">Open Order</a>
                                                <a class="btn btn-md btn-teal" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#products">View Products</a>
                                                <a class="btn btn-md btn-indigo">Print</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Orders -->
