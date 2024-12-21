<?php

namespace Modules\Cms\Repositories\Page;

use Log;
use Config;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Cms\Models\Page;
use Modules\Core\Traits\ExceptionHandlerTrait;
use Modules\Core\Traits\FileTrait;

class PageModelRepository implements PageRepository {
    use FileTrait, ExceptionHandlerTrait;

    private string $pageUploadPath = 'pages';

    /**
     * Fetch all pages with optional filters and pagination.
     */
    public function all(array $columns = ['*']): LengthAwarePaginator {
        $request = request();

        return Page::select($columns)->latest()
            ->when($request->filled('publish'), fn($q) => $q->where('publish', $request->query('publish')))
            ->when($request->filled('type'), fn($q) => $q->where('type', $request->query('type')))
            ->paginate(Config::get('core.page_size', 10));
    }

    /**
     * Find a page by ID.
     */
    public function find(int $id, array $columns = ['*']): ?Page {
        return Page::find($id, $columns);
    }

    /**
     * Store a new page.
     */
    public function store(array $data): mixed {
        return $this->execute(function () use ($data) {
            $pageData = $this->preparePageData($data);
            Page::create($pageData);
            $this->clearPageCache();
            session()->flushMessage(true);
        });
    }

    /**
     * Prepare page data for storage or update.
     */
    private function preparePageData(array $data, ?string $existingImage = null): array {
        $path = $this->handleImageUpload($data, $existingImage);
        $keywords = $this->parseKeywords($data['keywords']);

        $transTitle = [app()->getLocale() => $data['title']];
        $transDesc = [app()->getLocale() => $data['description']];
        $transKeywords = [app()->getLocale() => $keywords];
        $transContent = [app()->getLocale() => $data['content']];
        foreach (otherLangs() as $lang) {
            try {
                $transTitle[$lang] = autoGoogleTranslator($lang, $data['title']);
                $transDesc[$lang] = autoGoogleTranslator($lang, $data['description']);
                $transKeywords[$lang] = autoGoogleTranslator($lang, $keywords);
                $transContent[$lang] = autoGoogleTranslator($lang, $data['content']);

            } catch (Exception $e) {
                Log::error($e->getMessage());
            }
        }

        return array_merge($data, [
            'image' => $path,
            'title' => $transTitle,
            'description' => $transDesc,
            'content' => $transContent,
            'keywords' => $transKeywords,
            'publish' => $data['status'],
            'featured' => (int) $data['featured'],
        ]);
    }

    /**
     * Handle image upload.
     */
    private function handleImageUpload(array $data, ?string $existingImage = null): ?string {
        return $data['image']
            ? $this->upload($data['image'], $this->pageUploadPath, $data['slug'], $existingImage)
            : $existingImage;
    }

    /**
     * Parse keywords JSON input into a comma-separated string.
     */
    private function parseKeywords(?string $keywordsInput): string {
        if (!$keywordsInput) {
            return '';
        }

        $decoded = json_decode($keywordsInput, true);
        return $decoded ? implode(', ', array_column($decoded, 'value')) : '';
    }

    /**
     * Clear cached pages.
     */
    private function clearPageCache(): void {
        cache()->forget('pages');
    }

    /**
     * Update an existing page.
     */
    public function update(array $data, Page $page): mixed {
        return $this->execute(function () use ($data, $page) {
            $pageData = $this->preparePageData($data, $page->image);
            $page->update($pageData);
            $this->clearPageCache();
            session()->flushMessage(true);
            return true;
        });
    }

    /**
     * Delete multiple pages and clean up images.
     */
    public function deleteMulti(array $ids): ?bool {
        return $this->execute(function () use ($ids) {
            $images = Page::whereIn('id', $ids)->pluck('image')->filter()->toArray();
            Page::destroy($ids);
            $this->deleteFile($images);
            $this->clearPageCache();
            session()->flushMessage(true);
            return true;
        });
    }
}
