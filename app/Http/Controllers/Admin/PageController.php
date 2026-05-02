<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;


class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('sort_order')->latest();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:pages,slug'],
            'is_published' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'published_at' => ['nullable', 'date'],

            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],

            'canonical_url' => ['nullable', 'url'],
            'og_title' => ['nullable', 'string', 'max:255'],
            'og_description' => ['nullable', 'string'],
            'og_image' => ['nullable', 'string', 'max:255'],
            'schema_json' => ['nullable', 'string'],
            'status' => ['nullable', 'boolean'],
        ]);

        Page::create([
            'title' => $request->title,
            'slug' => $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title),
            'is_published' => $request->is_published ? 1 : 0,
            'sort_order' => $request->sort_order ?? 0,
            'published_at' => $request->published_at,

            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,

            'canonical_url' => $request->canonical_url,
            'og_title' => $request->og_title,
            'og_description' => $request->og_description,
            'og_image' => $request->og_image,
            'schema_json' => $request->schema_json,
            'status' => $request->status ? 1 : 0,
        ]);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page created successfully.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('pages', 'slug')->ignore($page->id)],
            'is_published' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'published_at' => ['nullable', 'date'],

            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],

            'canonical_url' => ['nullable', 'url'],
            'og_title' => ['nullable', 'string', 'max:255'],
            'og_description' => ['nullable', 'string'],
            'og_image' => ['nullable', 'string', 'max:255'],
            'schema_json' => ['nullable', 'string'],
            'status' => ['nullable', 'boolean'],
        ]);

        
        $page->update([
            'title' => $request->title,
            'slug' => $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title),
            'is_published' => $request->is_published ? 1 : 0,
            'sort_order' => $request->sort_order ?? 0,
            'published_at' => $request->published_at,

            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,

            'canonical_url' => $request->canonical_url,
            'og_title' => $request->og_title,
            'og_description' => $request->og_description,
            'og_image' => $request->og_image,
            'schema_json' => $request->schema_json,
            'status' => $request->status ? 1 : 0,
        ]);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page deleted successfully.');
    }

    public function datatable(Request $request)
    {
        $query = Page::query()->latest();

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->editColumn('status', function ($page) {
                return $page->status
                    ? '<span class="badge-soft-success">Active</span>'
                    : '<span class="badge-soft-danger">Inactive</span>';
            })
            ->editColumn('is_published', function ($page) {
                return $page->is_published
                    ? '<span class="badge-soft-primary">Published</span>'
                    : '<span class="badge-soft-warning">Draft</span>';
            })
            ->editColumn('published_at', function ($page) {
                return $page->published_at
                    ? $page->published_at->format('d M Y h:i A')
                    : '-';
            })
            ->addColumn('action', function ($page) {
                $editUrl = route('admin.pages.edit', $page->id);
                $deleteUrl = route('admin.pages.destroy', $page->id);

                return '
                    <a href="'.$editUrl.'" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="'.$deleteUrl.'" method="POST" class="d-inline-block" onsubmit="return confirm(\'Delete this page?\')">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                ';
            })
            ->rawColumns(['status', 'is_published', 'action'])
            ->make(true);
    }
}