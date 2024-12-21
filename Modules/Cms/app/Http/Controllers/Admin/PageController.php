<?php

namespace Modules\Cms\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Cms\Data\PageData;
use Modules\Cms\Models\Page;
use Modules\Cms\Repositories\Page\PageRepository;
use Modules\Core\Http\Requests\DeleteMultiRequest;
use Modules\User\Enums\CmsStatus;

class PageController extends Controller {
    protected PageRepository $pageRepository;

    public function __construct(PageRepository $pageRepository) {
        $this->pageRepository = $pageRepository;
        $this->setActive('cms');
        $this->setActive('pages');
    }

    /**
     * Display a listing of pages.
     */
    public function index() {
        $model = $this->pageRepository->all([
            'id', 'title', 'slug', 'image', 'status', 'featured', 'visits', 'created_at'
        ]);

        return view('cms::admin.page.index', compact('model'));
    }

    /**
     * Show the form for creating a new page.
     */
    public function create() {
        return view('cms::admin.page.create');
    }

    /**
     * Store a newly created page in storage.
     */
    public function store(Request $request): RedirectResponse {

        // Convert request data to PageData DTO
        $data = PageData::validate([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'keywords' => $request->input('keywords'),
            'image' => $request->file('img'),
            'status' => $request->has('publish') ? CmsStatus::PUBLISHED : CmsStatus::ARCHIVED,
            'featured' => $request->boolean('featured'),
        ]);

        $this->pageRepository->store($data);

        return redirect()->route('admin.pages.index');
    }

    /**
     * Show the form for editing the specified page.
     */
    public function edit(Page $page) {

        return view('cms::admin.page.edit', compact('page'));
    }

    /**
     * Update the specified page in storage.
     */
    public function update(Request $request, Page $page): RedirectResponse {
        // Convert request data to PageData DTO
        $data = PageData::validate([
            'title' => $request->input('title'),
            'slug' => $page->slug,
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'keywords' => $request->input('keywords'),
            'image' => $request->file('img'),
            'status' => $request->has('publish') ? CmsStatus::PUBLISHED : CmsStatus::ARCHIVED,
            'featured' => $request->boolean('featured'),
        ]);
        $this->pageRepository->update($data, $page);

        return redirect()->route('admin.pages.index');
    }

    /**
     * Remove multiple pages from storage.
     */
    public function deleteMulti(DeleteMultiRequest $request): RedirectResponse {
        $this->pageRepository->deleteMulti($request->input('ids'));

        return back();
    }
}
