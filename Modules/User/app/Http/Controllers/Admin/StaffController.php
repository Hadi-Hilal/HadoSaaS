<?php

namespace Modules\User\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\User\app\Data\UserData;
use Modules\User\app\Repositories\User\UserRepository;
use Modules\User\Http\Requests\StoreUserRequest;
use Modules\User\Repositories\Role\RoleRepository;

class StaffController extends Controller
{
    public function __construct(protected UserRepository $userRepository, protected RoleRepository $roleRepository)
    {
        $this->setActive('hr');
        $this->setActive('staffs');
    }

    public function index()
    {
        $roles = $this->roleRepository->all();
        $model = $this->userRepository->all('admin');

        return view('user::.admin.staff.index', compact('model', 'roles'));
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
        $user = $this->userRepository->find($id);
        $this->userRepository->update($userData, $user);

        return redirect()->route('admin.staffs.index');
    }

    public function destroy($id)
    {
        $user = $this->userRepository->find($id);
        $this->userRepository->delete($user);

        return response()->json([
            'success' => true,
        ]);
    }
}
