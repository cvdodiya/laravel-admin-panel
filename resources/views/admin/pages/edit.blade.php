@extends('layouts.admin')

@section('title', 'Edit Page')
@section('page_title', 'Edit Page')

@section('content')
<form action="{{ route('admin.pages.update', $page->id) }}" method="POST">
    @csrf
    @method('PUT')
    @include('admin.pages._form', ['buttonText' => 'Update Page', 'page' => $page])
</form>
@endsection

@push('scripts')
<script>
    document.getElementById('title').addEventListener('keyup', function() {
        let title = this.value.toLowerCase().trim();
        let slug = title
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
        document.getElementById('slug').value = slug;
    });
</script>
@endpush