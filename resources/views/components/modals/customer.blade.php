<div class="modal fade" id="create" tabindex="-1" aria-labelledby="create"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Create</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form onsubmit="createCustomer(this)">
                <div class="modal-body pb-1">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="mb-3">
                                <label class="form-label">Customer Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" placeholder="Customer Name" required class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" id="phone" placeholder="Phone Number" required class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" id="email" placeholder="Email Address" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="mb-3">
                                <label class="form-label">Birth Date</label>
                                <input type="date" name="birthday" id="birthday" placeholder="Birth Date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 mt-4">
                        <div class="processingCustomer"></div>
                        <div class="feedbackCustomer"></div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end gap-2 flex-wrap">
                    <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
