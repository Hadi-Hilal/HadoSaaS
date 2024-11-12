<?php

namespace Modules\User\Repositories\Role;


use App\Models\User;
use Modules\Core\Traits\ExceptionHandlerTrait;
use Spatie\Permission\Models\Role;

class RoleModelRepository implements RoleRepository
{
    use ExceptionHandlerTrait;

    public function store(string $name, array $permissions): ?Role
    {
        return $this->execute(function () use ($name, $permissions) {
            $role = Role::create(['name' => $name]);
            $role->syncPermissions($permissions);
            session()->flushMessage(true);
            return $role;
        });
    }

    public function update(int $id, string $name, array $permissions): ?Role
    {
        return $this->execute(function () use ($id, $name, $permissions) {
            $role = Role::findOrFail($id);
            $role->update(['name' => $name]);
            $role->syncPermissions($permissions);
            session()->flushMessage(true);
            return $role;
        });
    }

    public function delete(int $id): bool
    {
        return $this->execute(function () use ($id) {
            return Role::findOrFail($id)->delete();
        });
    }

    public function assignUsersToRole(int $id, array $userIds): bool
    {
        return $this->execute(function () use ($id, $userIds) {
            $role = Role::findOrFail($id);
            $users = User::whereIn('id', $userIds)->get();
            $role->users()->syncWithoutDetaching($users);
            session()->flushMessage(true);
            return true;
        });
    }

    public function removeUsersFromRole(int $id, array $userIds): bool
    {
        return $this->execute(function () use ($id, $userIds) {
            $role = Role::findOrFail($id);
            $users = User::whereIn('id', $userIds)->get();
            $role->users()->detach($users);
            session()->flushMessage(true);
            return true;
        });
    }

    public function removeUserFromRole(int $id, int $userId): bool
    {
        return $this->execute(function () use ($id, $userId) {
            $user = User::findOrFail($userId);
            $role = Role::findOrFail($id);
            $user->roles()->detach($role);
            session()->flushMessage(true);
            return true;
        });
    }
}
