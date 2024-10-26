@extends('backend.layouts.app', ['modal' => 'xl'])
@section('title', 'Product Specification Control')
@push('style')
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush
@section('page_name')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h3 mb-0">Specifications Update</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-house-add-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Product Specifications Update</li>
                    </ol>
                </div>

                {{-- @if (Auth::guard('admin')->user()->hasPermissionTo('category.create')) --}}
                <div class="col-sm-6 text-end">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-soft-success">
                        <i class="bi bi-plus"></i>
                        Create Product
                    </a>
                </div>
                {{-- @endif --}}
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="data-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created_by</th>
                                <th width="7%">Status</th>
                                <th width="7%">Featured?</th>
                                <th width="7%">Specs</th>
                                <th width="20%" class="text-center">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('styleforIconPicker')
    <link href="{{ asset('backend/assets/css/bootstrapicons-iconpicker.css') }}" rel="stylesheet">
    <style>
        tr td:nth-child(3) {
            text-align: center;
        }

        tr td:nth-child(3) i {
            font-size: 25px;
        }
    </style>
    <!-- Option 1: Include in HTML -->
@endpush

@push('script')
    <script src="{{ asset('backend/assets/js/bootstrapicon-iconpicker.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(function() {
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.product.specification.edit') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'created_by',
                        name: 'created_by',
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'is_featured',
                        name: 'is_featured',
                        orderable: false,
                        searchable: false
                    }, {
                        data: 'specifications_count',
                        name: 'specifications_count',
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            _componentRemoteModalLoadAfterAjax();
            _isfeaturedUpdate();
            _statusUpdate();

        });
    </script>
@endpush
