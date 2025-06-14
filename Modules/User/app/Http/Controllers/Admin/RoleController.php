<?php

namespace Modules\User\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\User\Http\Requests\RoleRequest;
use Modules\User\Http\Requests\RoleUsersRequest;
use Modules\User\Repositories\Role\RoleRepository;

class RoleController extends Controller
{
    public function __construct(protected RoleRepository $roleRepository)
    {
        $this->setActive('hr');
        $this->setActive('roles');
    }

    public function index()
    {
        $roles = $this->roleRepository->all();
        $permissions = $this->roleRepository->permissions();

        return view('user::admin.role.index', compact('roles', 'permissions'));
    }

    public function store(RoleRequest $request)
    {
        $this->roleRepository->store($request->input('role_name'), $request->input('permissions'));

        return back();
    }

    public function show($id)
    {
        $permissions = $this->roleRepository->permissions();
        $role = $this->roleRepository->findById($id);
        $users = user::type('admin')->whereDoesntHave('roles', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();

        return view('user::admin.role.show', compact('role', 'users', 'permissions'));
    }

    public function update(RoleRequest $request, $id)
    {
        $this->roleRepository->update($id, $request->input('role_name'), $request->input('permissions'));

        return back();
    }

    public function delete_role($id)
    {
        $this->roleRepository->delete($id);

        return redirect()->route('admin.roles.index');
    }

    public function assignUsersToRole(RoleUsersRequest $request)
    {
        $this->roleRepository->assignUsersToRole($request->input('role_id'), $request->input('user_ids'));

        return back();
    }

    public function removeUsersFromRole(RoleUsersRequest $request)
    {
        $this->roleRepository->removeUsersFromRole($request->input('role_id'), $request->input('user_ids'));

        return back();
    }

    public function removeUserFromRole(Request $request)
    {
        $request->validate([
            'role_id' => 'required',
            'user_id' => 'required',
        ]);
        $this->roleRepository->removeUserFromRole($request->input('role_id'), $request->input('user_id'));

        return response()->json(['success' => __('The Operation Done Successfully')]);
    }
}
