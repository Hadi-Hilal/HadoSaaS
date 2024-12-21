<?php

namespace Modules\Cms\Repositories\Page;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Cms\Models\Page;

interface PageRepository {
    /**
     * Get all pages with pagination.
     *
     * @param  array  $columns
     * @return LengthAwarePaginator
     */
    public function all(array $columns = ['*']): LengthAwarePaginator;

    /**
     * Find a page by its ID.
     *
     * @param  int  $id
     * @param  array  $columns
     * @return Page|null
     */
    public function find(int $id, array $columns = ['*']): ?Page;

    /**
     * Store a new page.
     *
     * @param  array  $data
     * @return mixed
     */
    public function store(array $data): mixed;

    /**
     * Update an existing page.
     *
     * @param  array  $data
     * @param  Page  $page
     * @return mixed
     */
    public function update(array $data, Page $page): mixed;

    /**
     * Delete multiple pages by their IDs.
     *
     * @param  array  $ids
     * @return bool
     */
    public function deleteMulti(array $ids): ?bool;
}
