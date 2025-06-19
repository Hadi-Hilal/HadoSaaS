<?php

namespace Modules\Cms\Repositories\BlogCategory;

use Config;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Log;
use Modules\Cms\Models\BlogCategory;
use Modules\Core\Traits\ExceptionHandlerTrait;

class BlogCategoryModelRepository implements BlogCategoryRepository {
    use ExceptionHandlerTrait;

    public function all(array $columns = ['*']): LengthAwarePaginator {
        return BlogCategory::select($columns)->latest()->paginate(Config::get('core.page_size', 10));
    }

    public function find(int $id, array $columns = ['*']): ?BlogCategory {
        return BlogCategory::find($id, $columns);
    }

    public function store(array $data): mixed {
        return $this->execute(function () use ($data) {
            $categoryData = $this->prepareCategoryData($data);
            BlogCategory::create($categoryData);
            session()->flushMessage(true);
        });
    }

    private function prepareCategoryData(array $data): array {
        $transName = [app()->getLocale() => $data['name']];
        foreach (otherLangs() as $lang) {
            try {
                $transName[$lang] = autoGoogleTranslator($lang, $data['name']);
            } catch (Exception $e) {
                Log::error($e->getMessage());
            }
        }
        return array_merge($data, [
            'name' => $transName,
        ]);
    }

    public function update(array $data, BlogCategory $category): mixed {
        return $this->execute(function () use ($data, $category) {
            $categoryData = $this->prepareCategoryData($data);
            $category->update($categoryData);
            session()->flushMessage(true);
            return true;
        });
    }

    public function deleteMulti(array $ids): ?bool {
        return $this->execute(function () use ($ids) {
            // If BlogCategory ever has images/files, delete them here (structure for extensibility)
            BlogCategory::destroy($ids);
            // Optionally clear cache or handle related cleanup here
            session()->flushMessage(true);
            return true;
        });
    }
}
