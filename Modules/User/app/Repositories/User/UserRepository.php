<?php

namespace Modules\User\app\Repositories\User;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\User\app\Data\UserData;

interface UserRepository
{
    public function all(string $type): LengthAwarePaginator;

    public function find(int $id): ?User;

    public function store(UserData $userData): ?User;

    public function update(UserData $userData, User $user): ?User;

    public function delete(User $user): bool;
}
