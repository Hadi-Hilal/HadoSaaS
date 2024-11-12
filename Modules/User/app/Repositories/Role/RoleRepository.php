<?php

namespace Modules\User\Repositories\Role;

use Spatie\Permission\Models\Role;

interface RoleRepository
{
    public function store(string $name, array $permissions): ?Role;

    public function update(int $role, string $name, array $permissions): ?Role;

    public function delete(int $role): ?bool;

    public function assignUsersToRole(int $role, array $userIds): bool;

    public function removeUsersFromRole(int $role, array $userIds): bool;

    public function removeUserFromRole(int $role, int $userId): bool;
}
