<div class="modal-header">
    <h5 class="modal-title">Create new Country</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        &times;
    </button>
</div>
<div class="modal-body">
    <form action="{{ route("admin.country.store") }}" enctype="multipart/form-data" method="POST" class="ajax-form">
        <div class="row">

            <div class="col-md-12 form-group">
                <label for="zone_id">Zone <span class="text-danger">*</span></label>
                <select name="zone_id" id="zone_id" class="form-control select" data-placeholder="Select Zone" data-parsley-errors-container="#zone_error" required>
                    <option value="">Select One</option>
                    @foreach ($zones as $zone)
                        <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                    @endforeach
                </select>
                <span id="zone_error"></span>
            </div>

            <div class="col-md-12 mt-3 form-group">
                <label for="image">Image <span class="text-danger">*</span></label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>

            <div class="col-md-12 mt-3 form-group">
                <label for="name">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="col-md-12 mt-3 form-group">
                <label for="status">Status <span class="text-danger">*</span></label>
                <select name="status" id="status" class="form-control select" required>
                    <option selected value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <div class="col-md-12 mt-3 text-end">
                <button class="btn btn-soft-success" type="submit" id="submit">
                    <i class="bi bi-send"></i>
                    Create
                </button>
                <button class="btn btn-soft-warning" style="display: none;" id="submitting" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
            </div>
        </div>
    </form>
</div>