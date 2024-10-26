@extends('backend.layouts.app')
@section('title', 'Roles & Permission')
@push('style')
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush
@section('page_name')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h3 mb-0">All Role</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-house-add-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Role & Permission</li>
                    </ol>
                </div>

                @if (Auth::guard('admin')->user()->hasPermissionTo('roles.create'))
                <div class="col-sm-6 text-end">
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-soft-success">
                        <i class="bi bi-plus"></i>
                        Create New Role
                    </a>
                </div>
                @endif
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script>

        $(function () {
        
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.roles.index') }}",
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            
        });

        $(document).on('click', '#delete_item', function(e) {
            e.preventDefault();
            var row = $(this).data('id');
            var url = $(this).data('url');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        method: 'Delete',
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: 'JSON',
                        success: function(data) {

                            if (data.status) {

                                toastr.success(data.message);
                                if (data.load) {
                                    setTimeout(function() {

                                        window.location.href = "";
                                    }, 1000);
                                }

                            } else {
                                toastr.warning(data.message);
                            }
                        },
                        error: function(data) {
                            var jsonValue = $.parseJSON(data.responseText);
                            const errors = jsonValue.errors
                            var i = 0;
                            $.each(errors, function(key, value) {
                                toastr.error(value);
                                i++;
                            });
                        }
                    });
                }
            });

        });
    </script>
@endpush