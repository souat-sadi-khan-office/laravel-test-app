{{-- @if (Auth::guard('admin')->user()->hasPermissionTo('brand.update')) --}}
    <a href="{{ route('admin.flash-deal.edit', $model->id) }}" class="btn btn-soft-warning" data-bs-toggle="tooltip" data-bs-placement="Top" title="Edit">
        <i class="bi bi-pen"></i>
    </a>
{{-- @endif --}}

{{-- @if (Auth::guard('admin')->user()->hasPermissionTo('brand.delete')) --}}
    <a href="javascript:;" id="delete_item" data-id ="{{ $model->id }}" data-url="{{ route('admin.flash-deal.destroy',$model->id) }}" class="btn btn-soft-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
        <i class="bi bi-trash"></i>
    </a>
{{-- @endif --}}