<?php

namespace Modules\User\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\User\app\Data\UserData;
use Modules\User\app\Repositories\User\UserRepository;
use Modules\User\Http\Requests\StoreUserRequest;
use Modules\User\Repositories\Role\RoleRepository;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{
  public function __construct(protected UserRepository $userRepository, protected RoleRepository $roleRepository)
    {
        $this->setActive('hr');
        $this->setActive('staffs');
    }

    public function index()
    {
        $roles = Role::all();
        $model = User::type('admin')->paginate(config('core.page_size'));
        return view('user::.admin.staff.index', compact('model' , 'roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $userData = UserData::validateAndCreate($request->all());
        $user = $this->userRepository->store($userData);
        $this->roleRepository->assignUsersToRole($request->input('role_id'), [$user->id]);
        return redirect()->route('admin.staffs.index');
    }


    public function update(Request $request, $id)
    {
        $userData = UserData::validateAndCreate($request->all());
        $user = User::findOrFail($id);
        $this->userRepository->update($userData, $user);
        return redirect()->route('admin.staffs.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $this->userRepository->delete($user);
        return response()->json([
            'success' => true
        ]);
    }

}
