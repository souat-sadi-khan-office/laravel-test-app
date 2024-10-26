<div class="modal-header">
    <h5 class="modal-title">Update Coupon Information</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        &times;
    </button>
</div>
<div class="modal-body">
    <form action="{{ route("admin.coupon.update", $model->id) }}" method="POST" class="ajax-form">
        <div class="row">

            <div class="col-md-12 mt-3 form-group">
                <label for="coupon_code">Coupon code <span class="text-danger">*</span></label>
                <input type="text" name="coupon_code" id="coupon_code" class="form-control" value="{{ $model->coupon_code }}" required>
            </div>
            
            <div class="col-md-4 mt-3 form-group">
                <label for="minimum_shipping_amount">Minimum shipping amount <span class="text-danger">*</span></label>
                <input type="text" name="minimum_shipping_amount" id="minimum_shipping_amount" value="{{ $model->minimum_shipping_amount }}" class="form-control" required>
            </div>
            
            <div class="col-md-4 mt-3 form-group">
                <label for="discount_amount">Discount amount <span class="text-danger">*</span></label>
                <input type="text" name="discount_amount" id="discount_amount" value="{{ $model->discount_amount }}" class="form-control" required>
            </div>
            
            <div class="col-md-4 mt-3 form-group">
                <label for="maximum_discount_amount">Maximum discount amount <span class="text-danger">*</span></label>
                <input type="text" name="maximum_discount_amount" id="maximum_discount_amount" value="{{ $model->maximum_discount_amount }}" class="form-control" required>
            </div>

            <div class="col-md-6 mt-3 form-group">
                <label for="status">Status <span class="text-danger">*</span></label>
                <select name="status" id="status" class="form-control select" required>
                    <option {{ $model->status == 1 ? 'selected' : '' }} value="1">Active</option>
                    <option {{ $model->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                </select>
            </div>
            
            <div class="col-md-6 mt-3 form-group">
                <label for="discount_type">Discount Type <span class="text-danger">*</span></label>
                <select name="discount_type" id="discount_type" class="form-control select" required>
                    <option {{ $model->discount_type == 'amount' ? 'selected' : '' }} value="amount">Amount</option>
                    <option {{ $model->discount_type == 'percent' ? 'selected' : '' }} value="percent">Percent</option>
                </select>
            </div>

            <div class="col-md-6 mt-3 form-group">
                <label for="start_date">Start date <span class="text-danger">*</span></label>
                <input type="text" name="start_date" id="start_date" value="{{ $model->start_date ? date('d-m-Y', strtotime($model->start_date)) : '' }}" class="form-control">
            </div>
            
            <div class="col-md-6 mt-3 form-group">
                <label for="end_date">End date</label>
                <input type="text" name="end_date" id="end_date" value="{{ $model->end_date ? date('d-m-Y', strtotime($model->end_date)) : '' }}" class="form-control" required>
            </div>

            <div class="col-md-12 mt-3 text-end">
                <button class="btn btn-soft-success" type="submit" id="submit">
                    <i class="bi bi-send"></i>
                    Update
                </button>
                <button class="btn btn-soft-warning" style="display: none;" id="submitting" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
            </div>
        </div>
    </form>
</div>