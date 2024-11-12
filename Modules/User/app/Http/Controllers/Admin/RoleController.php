<?php

namespace Modules\User\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\User\Repositories\Role\RoleRepository;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct(protected RoleRepository $roleRepository)
    {
        $this->setActive('hr');
        $this->setActive('roles');
    }

    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('user::admin.role.index', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string|min:2',
            'permissions' => 'required',
        ]);
        $this->roleRepository->store($request->input('role_name'), $request->input('permissions'));
        return back();
    }

    public function show($id)
    {
        $permissions = Permission::all();
        $role = Role::findOrFail($id);
        $users = user::type('admin')->whereDoesntHave('roles', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();

        return view('user::admin.role.show', compact('role', 'users', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role_name' => 'required|string|min:2',
            'permissions' => 'required'
        ]);
        $this->roleRepository->update($id, $request->input('role_name'), $request->input('permissions'));
        return back();
    }

    public function delete_role($id)
    {
        $this->roleRepository->delete($id);
        return redirect()->route('admin.roles.index');
    }

    public function assignUsersToRole(Request $request)
    {
        $request->validate([
            'role_id' => 'required',
            'user_ids' => 'required'
        ]);
        $this->roleRepository->assignUsersToRole($request->input('role_id'), $request->input('user_ids'));
        return back();
    }

    public function removeUsersFromRole(Request $request)
    {
        $request->validate([
            'role_id' => 'required',
            'user_ids' => 'required'
        ]);
        $this->roleRepository->removeUsersFromRole($request->input('role_id'), $request->input('user_ids'));
        return back();
    }

    public function removeUserFromRole(Request $request)
    {
        $request->validate([
            'role_id' => 'required',
            'user_id' => 'required'
        ]);
        $this->roleRepository->removeUserFromRole($request->input('role_id'), $request->input('user_id'));
        return response()->json(['success' => 'User removed from role successfully.']);
    }
}
