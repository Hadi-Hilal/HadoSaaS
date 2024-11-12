<?php

namespace Modules\User\app\Repositories\User;

use App\Models\User;
use Modules\User\app\Data\UserData;

interface UserRepository
{
    public function store(UserData $userData): ?User;

    public function update(UserData $userData, User $user): ?User;

    public function delete(User $user): bool;
}
