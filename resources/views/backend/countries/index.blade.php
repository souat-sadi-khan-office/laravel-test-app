@extends('backend.layouts.app', ['modal' => 'md'])
@section('title', 'Country Management')
@push('style')
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush
@section('page_name')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h3 mb-0">All Country List</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-house-add-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Country Management</li>
                    </ol>
                </div>

                {{-- @if (Auth::guard('admin')->user()->hasPermissionTo('country.create')) --}}
                    <div class="col-sm-6 text-end">
                        <a href="javascript:;" data-url="{{ route('admin.country.create') }}" id="content_management" class="btn btn-soft-success">
                            <i class="bi bi-plus"></i>
                            Create New
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
                <div class="col-md-12 my-3">
                    <div class="alert alert-warning" role="alert">
                        <b>Warning</b>: If you delete any country from here, then within this country - all city data will automatically delete. 
                    </div>
                </div>
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="data-table">
                        <thead>
                            <tr>
                                <th>Flag</th>
                                <th>Name</th>
                                <th>Zone</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script>

        $(function () {
        
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.country.index') }}",
                columns: [
                    {data: 'image', name: 'image'},
                    {data: 'name', name: 'name'},
                    {data: 'zone', name: 'zone'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            _componentRemoteModalLoadAfterAjax();
            _statusUpdate();
        });

        
    </script>
@endpush