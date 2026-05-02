@extends('layouts.admin')

@section('title', 'Add Page')
@section('page_title', 'Add Page')

@section('content')
<form action="{{ route('admin.pages.store') }}" method="POST">
    @csrf
    @include('admin.pages._form', ['buttonText' => 'Create Page'])
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