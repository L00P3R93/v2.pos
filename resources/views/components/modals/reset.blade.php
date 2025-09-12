<!-- Reset -->
<div class="modal fade modal-default" id="reset" aria-labelledby="payment-completed">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="success-wrap text-center">
                    <form>
                        <div class="icon-success bg-purple-transparent text-purple mb-2">
                            <i class="ti ti-transition-top"></i>
                        </div>
                        <h3 class="mb-2">Confirm Your Action</h3>
                        <p class="fs-16 mb-3">The current order will be cleared. But not deleted if it's persistent. Would you like to proceed ?</p>
                        <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
                            <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">No, Cancel</button>
                            <button type="button" onclick="clearCart()" class="btn btn-md btn-primary" data-bs-dismiss="modal">Yes, Proceed</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Reset -->
