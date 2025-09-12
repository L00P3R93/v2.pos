
@include('components.modals.customer')

@include('components.modals.reset')

@include('components.modals.orders')

<!-- Payment Completed -->
<div class="modal fade modal-default" id="payment-completed" aria-labelledby="payment-completed">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="success-wrap text-center">
                    <form action="https://dreamspos.dreamstechnologies.com/html/template/#">
                        <div class="icon-success bg-success text-white mb-2">
                            <i class="ti ti-check"></i>
                        </div>
                        <h3 class="mb-2">Payment Completed</h3>
                        <p class="mb-3">Do you want to Print Receipt for the Completed Order</p>
                        <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
                            <button type="button" class="btn btn-md btn-secondary" data-bs-toggle="modal" data-bs-target="#print-receipt">Print Receipt<i class="feather-arrow-right-circle icon-me-5"></i></button>
                            <button type="submit" class="btn btn-md btn-primary">Next Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Payment Completed -->

<!-- Print Receipt -->
<div class="modal fade modal-default" id="print-receipt" aria-labelledby="print-receipt">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="icon-head text-center">
                    <a href="javascript:void(0);">
                        <img src="assets/img/logo.svg" width="100" height="30" alt="Receipt Logo">
                    </a>
                </div>
                <div class="text-center info text-center">
                    <h6>Dreamguys Technologies Pvt Ltd.,</h6>
                    <p class="mb-0">Phone Number: +1 5656665656</p>
                    <p class="mb-0">Email: <a href="https://dreamspos.dreamstechnologies.com/cdn-cgi/l/email-protection#46233e272b362a2306212b272f2a6825292b"><span class="__cf_email__" data-cfemail="5d38253c302d31381d3a303c3431733e3230">[email&#160;protected]</span></a></p>
                </div>
                <div class="tax-invoice">
                    <h6 class="text-center">Tax Invoice</h6>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="invoice-user-name"><span>Name: </span>John Doe</div>
                            <div class="invoice-user-name"><span>Invoice No: </span>CS132453</div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="invoice-user-name"><span>Customer Id: </span>#LL93784</div>
                            <div class="invoice-user-name"><span>Date: </span>01.07.2022</div>
                        </div>
                    </div>
                </div>
                <table class="table-borderless w-100 table-fit">
                    <thead>
                    <tr>
                        <th># Item</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th class="text-end">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1. Red Nike Laser</td>
                        <td>$50</td>
                        <td>3</td>
                        <td class="text-end">$150</td>
                    </tr>
                    <tr>
                        <td>2. Iphone 14</td>
                        <td>$50</td>
                        <td>2</td>
                        <td class="text-end">$100</td>
                    </tr>
                    <tr>
                        <td>3. Apple Series 8</td>
                        <td>$50</td>
                        <td>3</td>
                        <td class="text-end">$150</td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <table class="table-borderless w-100 table-fit">
                                <tr>
                                    <td class="fw-bold">Sub Total :</td>
                                    <td class="text-end">$700.00</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Discount :</td>
                                    <td class="text-end">-$50.00</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Shipping :</td>
                                    <td class="text-end">0.00</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Tax (5%) :</td>
                                    <td class="text-end">$5.00</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Total Bill :</td>
                                    <td class="text-end">$655.00</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Due :</td>
                                    <td class="text-end">$0.00</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Total Payable :</td>
                                    <td class="text-end">$655.00</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="text-center invoice-bar">
                    <div class="border-bottom border-dashed">
                        <p>**VAT against this challan is payable through central registration. Thank you for your business!</p>
                    </div>
                    <a href="javascript:void(0);">
                        <img src="assets/img/barcode/barcode-03.jpg" alt="Barcode">
                    </a>
                    <p class="text-dark fw-bold">Sale 31</p>
                    <p>Thank You For Shopping With Us. Please Come Again</p>
                    <a href="javascript:void(0);" class="btn btn-md btn-primary">Print Receipt</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Print Receipt -->

<!-- Hold -->
<div class="modal fade modal-default pos-modal" id="hold-order" aria-labelledby="hold-order">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hold order</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="https://dreamspos.dreamstechnologies.com/html/template/#">
                <div class="modal-body">
                    <div class="bg-light br-10 p-4 text-center mb-3">
                        <h2 class="display-1">4500.00</h2>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Order Reference <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" value="" placeholder="">
                    </div>
                    <p>The current order will be set on hold. You can retreive this order from the pending order button. Providing a reference to it might help you to identify the order more quickly.</p>
                </div>
                <div class="modal-footer d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-md btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Hold -->

<!-- Recent Transactions -->
<div class="modal fade pos-modal" id="recents" tabindex="-1"    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Recent Transactions</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tabs-sets">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="purchase-tab" data-bs-toggle="tab" data-bs-target="#purchase" type="button"   aria-controls="purchase" aria-selected="true" role="tab">Purchase</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button"   aria-controls="payment" aria-selected="false" role="tab">Payment</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="return-tab" data-bs-toggle="tab" data-bs-target="#return" type="button"   aria-controls="return" aria-selected="false" role="tab">Return</button>
                        </li>
                    </ul>
                    <div class="tab-content" >
                        <div class="tab-pane fade show active" id="purchase" role="tabpanel" aria-labelledby="purchase-tab">
                            <div class="card mb-0">
                                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <span class="btn-searchset"><i class="ti ti-search fs-14 feather-search"></i></span>
                                        </div>
                                    </div>
                                    <ul class="table-top-head">
                                        <li>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i class="ti ti-printer"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table datatable border">
                                            <thead class="thead-light">
                                            <tr>
                                                <th class="no-sort">
                                                    <label class="checkboxs">
                                                        <input type="checkbox" class="select-all">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </th>
                                                <th>Customer</th>
                                                <th>Reference</th>
                                                <th>Date</th>
                                                <th>Amount	</th>
                                                <th class="no-sort">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-27.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Carl Evans</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0101</td>
                                                <td>24 Dec 2024</td>
                                                <td>$1000</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-02.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Minerva Rameriz</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0102</td>
                                                <td>10 Dec 2024</td>
                                                <td>$1500</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-05.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Robert Lamon</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0103</td>
                                                <td>27 Nov 2024</td>
                                                <td>$1500</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-22.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Patricia Lewis</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0104</td>
                                                <td>18 Nov 2024</td>
                                                <td>$2000</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-03.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Mark Joslyn</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0105</td>
                                                <td>06 Nov 2024</td>
                                                <td>$800</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-12.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Marsha Betts</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0106</td>
                                                <td>25 Oct 2024</td>
                                                <td>$750</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-06.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Daniel Jude</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0107</td>
                                                <td>14 Oct 2024</td>
                                                <td>$1300</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="payment" role="tabpanel" >
                            <div class="card mb-0">
                                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <span class="btn-searchset"><i class="ti ti-search fs-14 feather-search"></i></span>
                                        </div>
                                    </div>
                                    <ul class="table-top-head">
                                        <li>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i class="ti ti-printer"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table datatable border">
                                            <thead class="thead-light">
                                            <tr>
                                                <th class="no-sort">
                                                    <label class="checkboxs">
                                                        <input type="checkbox" class="select-all">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </th>
                                                <th>Customer</th>
                                                <th>Reference</th>
                                                <th>Date</th>
                                                <th>Amount	</th>
                                                <th class="no-sort">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-27.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Carl Evans</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0101</td>
                                                <td>24 Dec 2024</td>
                                                <td>$1000</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-02.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Minerva Rameriz</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0102</td>
                                                <td>10 Dec 2024</td>
                                                <td>$1500</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-05.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Robert Lamon</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0103</td>
                                                <td>27 Nov 2024</td>
                                                <td>$1500</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-22.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Patricia Lewis</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0104</td>
                                                <td>18 Nov 2024</td>
                                                <td>$2000</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-03.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Mark Joslyn</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0105</td>
                                                <td>06 Nov 2024</td>
                                                <td>$800</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-12.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Marsha Betts</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0106</td>
                                                <td>25 Oct 2024</td>
                                                <td>$750</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-06.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Daniel Jude</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0107</td>
                                                <td>14 Oct 2024</td>
                                                <td>$1300</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="return" role="tabpanel" >
                            <div class="card mb-0">
                                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                    <div class="search-set">
                                        <div class="search-input">
                                            <span class="btn-searchset"><i class="ti ti-search fs-14 feather-search"></i></span>
                                        </div>
                                    </div>
                                    <ul class="table-top-head">
                                        <li>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i class="ti ti-printer"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table datatable border">
                                            <thead class="thead-light">
                                            <tr>
                                                <th class="no-sort">
                                                    <label class="checkboxs">
                                                        <input type="checkbox" class="select-all">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </th>
                                                <th>Customer</th>
                                                <th>Reference</th>
                                                <th>Date</th>
                                                <th>Amount	</th>
                                                <th class="no-sort">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-27.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Carl Evans</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0101</td>
                                                <td>24 Dec 2024</td>
                                                <td>$1000</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-02.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Minerva Rameriz</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0102</td>
                                                <td>10 Dec 2024</td>
                                                <td>$1500</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-05.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Robert Lamon</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0103</td>
                                                <td>27 Nov 2024</td>
                                                <td>$1500</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-22.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Patricia Lewis</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0104</td>
                                                <td>18 Nov 2024</td>
                                                <td>$2000</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-03.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Mark Joslyn</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0105</td>
                                                <td>06 Nov 2024</td>
                                                <td>$800</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-12.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Marsha Betts</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0106</td>
                                                <td>25 Oct 2024</td>
                                                <td>$750</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkboxs">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                            <img src="assets/img/users/user-06.jpg" alt="product">
                                                        </a>
                                                        <a href="javascript:void(0);">Daniel Jude</a>
                                                    </div>
                                                </td>
                                                <td>INV/SL0107</td>
                                                <td>14 Oct 2024</td>
                                                <td>$1300</td>
                                                <td class="action-table-data">
                                                    <div class="edit-delete-action">
                                                        <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                        <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                        <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Recent Transactions -->

<!-- Payment Cash -->
<div class="modal fade modal-default" id="payment-cash">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Finalize Sale</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="https://dreamspos.dreamstechnologies.com/html/template/#">
                <div class="modal-body pb-1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Received Amount <span class="text-danger">*</span></label>
                                <div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                    <input type="text" class="form-control" value="1800">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Paying Amount <span class="text-danger">*</span></label>
                                <div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                    <input type="text" class="form-control" value="1800">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="change-item mb-3">
                                <label class="form-label">Change</label>
                                <div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                    <input type="text" class="form-control" value="0.00">
                                </div>
                            </div>
                            <div class="point-item mb-3">
                                <label class="form-label">Balance Point</label>
                                <input type="text" class="form-control" value="200">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Payment Type <span class="text-danger">*</span></label>
                                <select class="select select-payment">
                                    <option value="credit">Credit Card</option>
                                    <option value="cash" selected>Cash</option>
                                    <option value="cheque">Cheque</option>
                                    <option value="deposit">Deposit</option>
                                    <option value="points">Points</option>
                                </select>
                            </div>
                            <div class="quick-cash payment-content bg-light  mb-3">
                                <div class="d-flex align-items-center flex-wra gap-4">
                                    <h5 class="text-nowrap">Quick Cash</h5>
                                    <div class="d-flex align-items-center flex-wrap gap-3">
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash1" checked>
                                            <label class="btn btn-white" for="cash1">10</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash2">
                                            <label class="btn btn-white" for="cash2">20</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash3">
                                            <label class="btn btn-white" for="cash3">50</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash4">
                                            <label class="btn btn-white" for="cash4">100</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash5">
                                            <label class="btn btn-white" for="cash5">500</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash6">
                                            <label class="btn btn-white" for="cash6">1000</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="point-wrap payment-content mb-3">
                                <div class=" bg-success-transparent d-flex align-items-center justify-content-between flex-wrap p-2 gap-2 br-5">
                                    <h6 class="fs-14 fw-bold text-success">You have 2000 Points to Use</h6>
                                    <a href="javascript:void(0);" class="btn btn-dark btn-md">Use for this Purchase</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Payment Receiver</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Payment Note</label>
                                <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Sale Note</label>
                                <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Staff Note</label>
                                <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                    <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Payment Cash  -->

<!-- Payment Card  -->
<div class="modal fade modal-default" id="payment-card">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Finalize Sale</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="https://dreamspos.dreamstechnologies.com/html/template/#">
                <div class="modal-body pb-1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Received Amount <span class="text-danger">*</span></label>
                                <div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                    <input type="text" class="form-control" value="1800">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Paying Amount <span class="text-danger">*</span></label>
                                <div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                    <input type="text" class="form-control" value="1800">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="change-item mb-3">
                                <label class="form-label">Change</label>
                                <div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                    <input type="text" class="form-control" value="0.00">
                                </div>
                            </div>
                            <div class="point-item mb-3">
                                <label class="form-label">Balance Point</label>
                                <input type="text" class="form-control" value="200">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Payment Type <span class="text-danger">*</span></label>
                                <select class="select select-payment">
                                    <option value="credit" selected>Credit Card</option>
                                    <option value="cash">Cash</option>
                                    <option value="cheque">Cheque</option>
                                    <option value="deposit">Deposit</option>
                                    <option value="points">Points</option>
                                </select>
                            </div>
                            <div class="quick-cash payment-content bg-light  mb-3">
                                <div class="d-flex align-items-center flex-wra gap-4">
                                    <h5 class="text-nowrap">Quick Cash</h5>
                                    <div class="d-flex align-items-center flex-wrap gap-3">
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash11" checked>
                                            <label class="btn btn-white" for="cash11">10</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash12">
                                            <label class="btn btn-white" for="cash12">20</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash13">
                                            <label class="btn btn-white" for="cash13">50</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash14">
                                            <label class="btn btn-white" for="cash14">100</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash15">
                                            <label class="btn btn-white" for="cash15">500</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash16">
                                            <label class="btn btn-white" for="cash16">1000</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="point-wrap payment-content mb-3">
                                <div class=" bg-success-transparent d-flex align-items-center justify-content-between flex-wrap p-2 gap-2 br-5">
                                    <h6 class="fs-14 fw-bold text-success">You have 2000 Points to Use</h6>
                                    <a href="javascript:void(0);" class="btn btn-dark btn-md">Use for this Purchase</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Payment Receiver</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Payment Note</label>
                                <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Sale Note</label>
                                <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Staff Note</label>
                                <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                    <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Payment Card  -->

<!-- Payment Cheque -->
<div class="modal fade modal-default" id="payment-cheque">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Finalize Sale</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="https://dreamspos.dreamstechnologies.com/html/template/#">
                <div class="modal-body pb-1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Received Amount <span class="text-danger">*</span></label>
                                <div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                    <input type="text" class="form-control" value="1800">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Paying Amount <span class="text-danger">*</span></label>
                                <div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                    <input type="text" class="form-control" value="1800">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="change-item mb-3">
                                <label class="form-label">Change</label>
                                <div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                    <input type="text" class="form-control" value="0.00">
                                </div>
                            </div>
                            <div class="point-item mb-3">
                                <label class="form-label">Balance Point</label>
                                <input type="text" class="form-control" value="200">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Payment Type <span class="text-danger">*</span></label>
                                <select class="select select-payment">
                                    <option value="credit">Credit Card</option>
                                    <option value="cash">Cash</option>
                                    <option value="cheque" selected>Cheque</option>
                                    <option value="deposit">Deposit</option>
                                    <option value="points">Points</option>
                                </select>
                            </div>
                            <div class="quick-cash payment-content bg-light  mb-3">
                                <div class="d-flex align-items-center flex-wra gap-4">
                                    <h5 class="text-nowrap">Quick Cash</h5>
                                    <div class="d-flex align-items-center flex-wrap gap-3">
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash21" checked>
                                            <label class="btn btn-white" for="cash21">10</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash22">
                                            <label class="btn btn-white" for="cash22">20</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash23">
                                            <label class="btn btn-white" for="cash23">50</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash24">
                                            <label class="btn btn-white" for="cash24">100</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash25">
                                            <label class="btn btn-white" for="cash25">500</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash26">
                                            <label class="btn btn-white" for="cash26">1000</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="point-wrap payment-content mb-3">
                                <div class=" bg-success-transparent d-flex align-items-center justify-content-between flex-wrap p-2 gap-2 br-5">
                                    <h6 class="fs-14 fw-bold text-success">You have 2000 Points to Use</h6>
                                    <a href="javascript:void(0);" class="btn btn-dark btn-md">Use for this Purchase</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Payment Receiver</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Payment Note</label>
                                <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Sale Note</label>
                                <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Staff Note</label>
                                <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                    <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Payment Cheque -->

<!--  Payment Deposit -->
<div class="modal fade modal-default" id="payment-deposit">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Finalize Sale</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="https://dreamspos.dreamstechnologies.com/html/template/#">
                <div class="modal-body pb-1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Received Amount <span class="text-danger">*</span></label>
                                <div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                    <input type="text" class="form-control" value="1800">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Paying Amount <span class="text-danger">*</span></label>
                                <div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                    <input type="text" class="form-control" value="1800">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="change-item mb-3">
                                <label class="form-label">Change</label>
                                <div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                    <input type="text" class="form-control" value="0.00">
                                </div>
                            </div>
                            <div class="point-item mb-3">
                                <label class="form-label">Balance Point</label>
                                <input type="text" class="form-control" value="200">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Payment Type <span class="text-danger">*</span></label>
                                <select class="select select-payment">
                                    <option value="credit">Credit Card</option>
                                    <option value="cash">Cash</option>
                                    <option value="cheque">Cheque</option>
                                    <option value="deposit" selected>Deposit</option>
                                    <option value="points">Points</option>
                                </select>
                            </div>
                            <div class="quick-cash payment-content bg-light  mb-3">
                                <div class="d-flex align-items-center flex-wra gap-4">
                                    <h5 class="text-nowrap">Quick Cash</h5>
                                    <div class="d-flex align-items-center flex-wrap gap-3">
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash31" checked>
                                            <label class="btn btn-white" for="cash31">10</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash32">
                                            <label class="btn btn-white" for="cash32">20</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash33">
                                            <label class="btn btn-white" for="cash33">50</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash34">
                                            <label class="btn btn-white" for="cash34">100</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash35">
                                            <label class="btn btn-white" for="cash35">500</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash36">
                                            <label class="btn btn-white" for="cash36">1000</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="point-wrap payment-content mb-3">
                                <div class=" bg-success-transparent d-flex align-items-center justify-content-between flex-wrap p-2 gap-2 br-5">
                                    <h6 class="fs-14 fw-bold text-success">You have 2000 Points to Use</h6>
                                    <a href="javascript:void(0);" class="btn btn-dark btn-md">Use for this Purchase</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Payment Receiver</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Payment Note</label>
                                <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Sale Note</label>
                                <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Staff Note</label>
                                <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                    <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Payment Deposit -->

<!-- Payment Point -->
<div class="modal fade modal-default" id="payment-points">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Finalize Sale</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="https://dreamspos.dreamstechnologies.com/html/template/#">
                <div class="modal-body pb-1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Received Amount <span class="text-danger">*</span></label>
                                <div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                    <input type="text" class="form-control" value="1800">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Paying Amount <span class="text-danger">*</span></label>
                                <div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                    <input type="text" class="form-control" value="1800">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="change-item mb-3">
                                <label class="form-label">Change</label>
                                <div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                    <input type="text" class="form-control" value="0.00">
                                </div>
                            </div>
                            <div class="point-item mb-3">
                                <label class="form-label">Balance Point</label>
                                <input type="text" class="form-control" value="200">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Payment Type <span class="text-danger">*</span></label>
                                <select class="select select-payment">
                                    <option value="credit">Credit Card</option>
                                    <option value="cash">Cash</option>
                                    <option value="cheque">Cheque</option>
                                    <option value="deposit">Deposit</option>
                                    <option value="points" selected>Points</option>
                                </select>
                            </div>
                            <div class="quick-cash payment-content bg-light  mb-3">
                                <div class="d-flex align-items-center flex-wra gap-4">
                                    <h5 class="text-nowrap">Quick Cash</h5>
                                    <div class="d-flex align-items-center flex-wrap gap-3">
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash41" checked>
                                            <label class="btn btn-white" for="cash41">10</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash42">
                                            <label class="btn btn-white" for="cash42">20</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash43">
                                            <label class="btn btn-white" for="cash43">50</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash44">
                                            <label class="btn btn-white" for="cash44">100</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash45">
                                            <label class="btn btn-white" for="cash45">500</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="btn-check" name="cash" id="cash46">
                                            <label class="btn btn-white" for="cash46">1000</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="point-wrap payment-content mb-3">
                                <div class=" bg-success-transparent d-flex align-items-center justify-content-between flex-wrap p-2 gap-2 br-5">
                                    <h6 class="fs-14 fw-bold text-success">You have 2000 Points to Use</h6>
                                    <a href="javascript:void(0);" class="btn btn-dark btn-md">Use for this Purchase</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Payment Receiver</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Payment Note</label>
                                <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Sale Note</label>
                                <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Staff Note</label>
                                <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                    <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Payment Point -->

<!-- Order Tax -->
<div class="modal fade modal-default" id="order-tax">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order Tax</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="https://dreamspos.dreamstechnologies.com/html/template/#">
                <div class="modal-body pb-1">
                    <div class="mb-3">
                        <label class="form-label">Order Tax <span class="text-danger">*</span></label>
                        <select class="select">
                            <option>Select</option>
                            <option>No Tax</option>
                            <option>@10</option>
                            <option>@15</option>
                            <option>VAT</option>
                            <option>SLTAX</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                    <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Order Tax -->

<!-- Shipping Cost -->
<div class="modal fade modal-default" id="shipping-cost">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Shipping Cost</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="https://dreamspos.dreamstechnologies.com/html/template/#">
                <div class="modal-body pb-1">
                    <div class="mb-3">
                        <label class="form-label">Shipping Cost <span class="text-danger">*</span></label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                    <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Shipping Cost -->

<!-- Discount -->
<div class="modal fade modal-default" id="discount">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Discount </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="https://dreamspos.dreamstechnologies.com/html/template/#">
                <div class="modal-body pb-1">
                    <div class="mb-3">
                        <label class="form-label">Order Discount Type <span class="text-danger">*</span></label>
                        <select class="select">
                            <option>Select</option>
                            <option>Flat</option>
                            <option>Percentage</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Value <span class="text-danger">*</span></label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                    <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Discount -->

<!-- Calculator -->
<div class="modal fade pos-modal" id="calculator" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="calculator-wrap">
                    <div class="p-3">
                        <div class="d-flex align-items-center">
                            <h3>Calculator</h3>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div>
                            <input class="input" type="text" placeholder="0" readonly>
                        </div>
                    </div>
                    <div class="calculator-body d-flex justify-content-between">
                        <div class="text-center">
                            <button class="btn btn-clear" onclick="if (!window.__cfRLUnblockHandlers) return false; clr()" data-cf-modified-df3694c25d2722345a4d207b-="">C</button>
                            <button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('7')" data-cf-modified-df3694c25d2722345a4d207b-="">7</button>
                            <button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('4')" data-cf-modified-df3694c25d2722345a4d207b-="">4</button>
                            <button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('1')" data-cf-modified-df3694c25d2722345a4d207b-="">1</button>
                            <button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis(',')" data-cf-modified-df3694c25d2722345a4d207b-="">,</button>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-expression" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('https://dreamspos.dreamstechnologies.com/')" data-cf-modified-df3694c25d2722345a4d207b-="">÷</button>
                            <button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('8')" data-cf-modified-df3694c25d2722345a4d207b-="">8</button>
                            <button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('5')" data-cf-modified-df3694c25d2722345a4d207b-="">5</button>
                            <button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('2')" data-cf-modified-df3694c25d2722345a4d207b-="">2</button>
                            <button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('00')" data-cf-modified-df3694c25d2722345a4d207b-="">00</button>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-expression" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('%')" data-cf-modified-df3694c25d2722345a4d207b-="">%</button>
                            <button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('9')" data-cf-modified-df3694c25d2722345a4d207b-="">9</button>
                            <button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('6')" data-cf-modified-df3694c25d2722345a4d207b-="">6</button>
                            <button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('3')" data-cf-modified-df3694c25d2722345a4d207b-="">3</button>
                            <button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('.')" data-cf-modified-df3694c25d2722345a4d207b-="">.</button>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-clear" onclick="if (!window.__cfRLUnblockHandlers) return false; back()" data-cf-modified-df3694c25d2722345a4d207b-=""><i class="ti ti-backspace"></i></button>
                            <button class="btn btn-expression" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('*')" data-cf-modified-df3694c25d2722345a4d207b-="">x</button>
                            <button class="btn btn-expression" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('-')" data-cf-modified-df3694c25d2722345a4d207b-="">-</button>
                            <button class="btn btn-expression" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('+')" data-cf-modified-df3694c25d2722345a4d207b-="">+</button>
                            <button class="btn btn-clear" onclick="if (!window.__cfRLUnblockHandlers) return false; solve()" data-cf-modified-df3694c25d2722345a4d207b-="">=</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Calculator -->

<!-- Cash Register Details -->
<div class="modal fade pos-modal" id="cash-register" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cash Register Details</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped border">
                        <tr>
                            <td>Cash in Hand</td>
                            <td class="text-gray-9 fw-medium text-end">$45689</td>
                        </tr>
                        <tr>
                            <td>Total Sale Amount</td>
                            <td class="text-gray-9 fw-medium text-end">$565597.88</td>
                        </tr>
                        <tr>
                            <td>Total Payment</td>
                            <td class="text-gray-9 fw-medium text-end">$566867.97</td>
                        </tr>
                        <tr>
                            <td>Cash Payment</td>
                            <td class="text-gray-9 fw-medium text-end">$3355.84</td>
                        </tr>
                        <tr>
                            <td>Total Sale Return</td>
                            <td class="text-gray-9 fw-medium text-end">$1959</td>
                        </tr>
                        <tr>
                            <td>Total Expense</td>
                            <td class="text-gray-9 fw-medium text-end">$0</td>
                        </tr>
                        <tr>
                            <td class="text-gray-9 fw-bold bg-secondary-transparent">Total Cash</td>
                            <td class="text-gray-9 fw-bold text-end bg-secondary-transparent">$587130.97</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-end gap-2 flex-wrap">
                <button type="button" class="btn btn-md btn-primary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- /Cash Register Details -->

<!-- Today's Sale -->
<div class="modal fade pos-modal" id="today-sale" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Today's Sale</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped border">
                        <tr>
                            <td>Total Sale Amount</td>
                            <td class="text-gray-9 fw-medium text-end">$565597.88</td>
                        </tr>
                        <tr>
                            <td>Cash Payment</td>
                            <td class="text-gray-9 fw-medium text-end">$3355.84</td>
                        </tr>
                        <tr>
                            <td>Credit Card Payment</td>
                            <td class="text-gray-9 fw-medium text-end">$1959</td>
                        </tr>
                        <tr>
                            <td>Cheque Payment:</td>
                            <td class="text-gray-9 fw-medium text-end">$0</td>
                        </tr>
                        <tr>
                            <td>Deposit Payment</td>
                            <td class="text-gray-9 fw-medium text-end">$565597.88</td>
                        </tr>
                        <tr>
                            <td>Points Payment</td>
                            <td class="text-gray-9 fw-medium text-end">$3355.84</td>
                        </tr>
                        <tr>
                            <td>Gift Card Payment</td>
                            <td class="text-gray-9 fw-medium text-end">$565597.88</td>
                        </tr>
                        <tr>
                            <td>Scan & Pay</td>
                            <td class="text-gray-9 fw-medium text-end">$3355.84</td>
                        </tr>
                        <tr>
                            <td>Pay Later</td>
                            <td class="text-gray-9 fw-medium text-end">$3355.84</td>
                        </tr>
                        <tr>
                            <td>Total Payment</td>
                            <td class="text-gray-9 fw-medium text-end">$565597.88</td>
                        </tr>
                        <tr>
                            <td>Total Sale Return</td>
                            <td class="text-gray-9 fw-medium text-end">$565597.88</td>
                        </tr>
                        <tr>
                            <td>Total Expense:</td>
                            <td class="text-gray-9 fw-medium text-end">$565597.88</td>
                        </tr>
                        <tr>
                            <td class="text-gray-9 fw-bold bg-secondary-transparent">Total Cash</td>
                            <td class="text-gray-9 fw-bold text-end bg-secondary-transparent">$587130.97</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-end gap-2 flex-wrap">
                <button type="button" class="btn btn-md btn-primary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- /Today's Sale -->

<!-- Today's Profit -->
<div class="modal fade pos-modal" id="today-profit" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Today's Profit</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center g-3 mb-3">
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="border border-success bg-success-transparent br-8 p-3 flex-fill">
                            <p class="fs-16 text-gray-9 mb-1">Total Sale</p>
                            <h3 class="text-success">$89954</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="border border-danger bg-danger-transparent br-8 p-3 flex-fill">
                            <p class="fs-16 text-gray-9 mb-1">Expense</p>
                            <h3 class="text-danger">$89954</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="border border-info bg-info-transparent br-8 p-3 flex-fill">
                            <p class="fs-16 text-gray-9 mb-1">Total Profit	</p>
                            <h3 class="text-info">$2145</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped border">
                        <tr>
                            <td>Product Revenue</td>
                            <td class="text-gray-9 fw-medium text-end">$565597.88</td>
                        </tr>
                        <tr>
                            <td>Product Cost</td>
                            <td class="text-gray-9 fw-medium text-end">$3355.84</td>
                        </tr>
                        <tr>
                            <td>Expense</td>
                            <td class="text-gray-9 fw-medium text-end">$1959</td>
                        </tr>
                        <tr>
                            <td>Total Stock Adjustment</td>
                            <td class="text-gray-9 fw-medium text-end">$0</td>
                        </tr>
                        <tr>
                            <td>Deposit Payment</td>
                            <td class="text-gray-9 fw-medium text-end">$565597.88</td>
                        </tr>
                        <tr>
                            <td>Total Purchase Shipping Cost</td>
                            <td class="text-gray-9 fw-medium text-end">$3355.84</td>
                        </tr>
                        <tr>
                            <td>Total Sell Discount</td>
                            <td class="text-gray-9 fw-medium text-end">$565597.88</td>
                        </tr>
                        <tr>
                            <td>Total Sell Return</td>
                            <td class="text-gray-9 fw-medium text-end">$3355.84</td>
                        </tr>
                        <tr>
                            <td>Closing Stock</td>
                            <td class="text-gray-9 fw-medium text-end">$3355.84</td>
                        </tr>
                        <tr>
                            <td>Total Sales</td>
                            <td class="text-gray-9 fw-medium text-end">$565597.88</td>
                        </tr>
                        <tr>
                            <td>Total Sale Return</td>
                            <td class="text-gray-9 fw-medium text-end">$565597.88</td>
                        </tr>
                        <tr>
                            <td>Total Expense</td>
                            <td class="text-gray-9 fw-medium text-end">$565597.88</td>
                        </tr>
                        <tr>
                            <td class="text-gray-9 fw-bold bg-secondary-transparent">Total Cash</td>
                            <td class="text-gray-9 fw-bold text-end bg-secondary-transparent">$587130.97</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-end gap-2 flex-wrap">
                <button type="button" class="btn btn-md btn-primary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- /Today's Profit -->
