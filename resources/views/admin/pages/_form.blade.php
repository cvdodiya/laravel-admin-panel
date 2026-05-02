@php
    $page = $page ?? null;
@endphp

<div class="row">
    <div class="col-md-8">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Page Details</h3>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label for="title">Title <span class="text-danger">*</span></label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $page->title ?? '') }}"
                        placeholder="Enter page title">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input
                        type="text"
                        name="slug"
                        id="slug"
                        class="form-control @error('slug') is-invalid @enderror"
                        value="{{ old('slug', $page->slug ?? '') }}"
                        placeholder="enter-page-slug">
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input
                        type="text"
                        name="meta_title"
                        id="meta_title"
                        class="form-control @error('meta_title') is-invalid @enderror"
                        value="{{ old('meta_title', $page->meta_title ?? '') }}"
                        placeholder="Meta title">
                    @error('meta_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="meta_keywords">Meta Keywords</label>
                    <textarea
                        name="meta_keywords"
                        id="meta_keywords"
                        rows="2"
                        class="form-control @error('meta_keywords') is-invalid @enderror"
                        placeholder="keyword1, keyword2">{{ old('meta_keywords', $page->meta_keywords ?? '') }}</textarea>
                    @error('meta_keywords')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea
                        name="meta_description"
                        id="meta_description"
                        rows="3"
                        class="form-control @error('meta_description') is-invalid @enderror"
                        placeholder="Meta description">{{ old('meta_description', $page->meta_description ?? '') }}</textarea>
                    @error('meta_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="canonical_url">Canonical URL</label>
                    <input
                        type="url"
                        name="canonical_url"
                        id="canonical_url"
                        class="form-control @error('canonical_url') is-invalid @enderror"
                        value="{{ old('canonical_url', $page->canonical_url ?? '') }}"
                        placeholder="https://example.com/page-url">
                    @error('canonical_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="og_title">OG Title</label>
                    <input
                        type="text"
                        name="og_title"
                        id="og_title"
                        class="form-control @error('og_title') is-invalid @enderror"
                        value="{{ old('og_title', $page->og_title ?? '') }}"
                        placeholder="Open Graph title">
                    @error('og_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="og_description">OG Description</label>
                    <textarea
                        name="og_description"
                        id="og_description"
                        rows="3"
                        class="form-control @error('og_description') is-invalid @enderror"
                        placeholder="Open Graph description">{{ old('og_description', $page->og_description ?? '') }}</textarea>
                    @error('og_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="og_image">OG Image</label>
                    <input
                        type="text"
                        name="og_image"
                        id="og_image"
                        class="form-control @error('og_image') is-invalid @enderror"
                        value="{{ old('og_image', $page->og_image ?? '') }}"
                        placeholder="image path or URL">
                    @error('og_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="schema_json">Schema JSON</label>
                    <textarea
                        name="schema_json"
                        id="schema_json"
                        rows="5"
                        class="form-control @error('schema_json') is-invalid @enderror"
                        placeholder='{"@context":"https://schema.org"}'>{{ old('schema_json', $page->schema_json ?? '') }}</textarea>
                    @error('schema_json')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Publish Settings</h3>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label for="sort_order">Sort Order</label>
                    <input
                        type="number"
                        name="sort_order"
                        id="sort_order"
                        class="form-control @error('sort_order') is-invalid @enderror"
                        value="{{ old('sort_order', $page->sort_order ?? 0) }}">
                    @error('sort_order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input
                        type="datetime-local"
                        name="published_at"
                        id="published_at"
                        class="form-control @error('published_at') is-invalid @enderror"
                        value="{{ old('published_at', isset($page) && $page->published_at ? $page->published_at->format('Y-m-d\TH:i') : '') }}">
                    @error('published_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="d-block">Status</label>
                    <div class="custom-control custom-switch">
                        <input
                            type="checkbox"
                            name="status"
                            value="1"
                            class="custom-control-input"
                            id="status"
                            {{ old('status', $page->status ?? 1) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="status">Active</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="d-block">Publish</label>
                    <div class="custom-control custom-switch">
                        <input
                            type="checkbox"
                            name="is_published"
                            value="1"
                            class="custom-control-input"
                            id="is_published"
                            {{ old('is_published', $page->is_published ?? 1) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="is_published">Published</label>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    {{ $buttonText ?? 'Save' }}
                </button>
                <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>