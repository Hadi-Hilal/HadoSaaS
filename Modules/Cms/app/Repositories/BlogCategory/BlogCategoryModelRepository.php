<?php

namespace Modules\Cms\Repositories\BlogCategory;

use Config;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Cms\Models\BlogCategory;
use Modules\Core\Traits\ExceptionHandlerTrait;

class BlogCategoryModelRepository implements BlogCategoryRepository
{
    use ExceptionHandlerTrait;

    public function all(array $columns = ['*']): LengthAwarePaginator
    {
        return BlogCategory::select($columns)->latest()->paginate(Config::get('core.page_size', 10));
    }

    public function find(int $id, array $columns = ['*']): ?BlogCategory
    {
        return BlogCategory::find($id, $columns);
    }

    public function store(array $data): mixed
    {
        return $this->execute(function () use ($data) {
            BlogCategory::create($data);
            session()->flushMessage(true);
        });
    }

    public function update(array $data, BlogCategory $category): mixed
    {
        return $this->execute(function () use ($data, $category) {
            $category->update($data);
            session()->flushMessage(true);

            return true;
        });
    }

    public function deleteMulti(array $ids): ?bool
    {
        return $this->execute(function () use ($ids) {
            BlogCategory::destroy($ids);
            session()->flushMessage(true);

            return true;
        });
    }
}
