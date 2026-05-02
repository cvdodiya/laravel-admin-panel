@extends('layouts.admin')

@section('title', 'Pages')
@section('page_title', 'Pages')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">Page List</h3>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus mr-1"></i> Add Page
        </a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table id="pagesTable" class="table table-bordered table-striped w-100">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Meta Title</th>
                        <th>Status</th>
                        <th>Publish</th>
                        <th>Published At</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>

        
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function () {
        $('#pagesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.pages.datatable') }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'title', name: 'title' },
                { data: 'slug', name: 'slug' },
                { data: 'meta_title', name: 'meta_title' },
                { data: 'status', name: 'status', orderable: false, searchable: false },
                { data: 'is_published', name: 'is_published', orderable: false, searchable: false },
                { data: 'published_at', name: 'published_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush