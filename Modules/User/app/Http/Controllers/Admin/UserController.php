<?php

namespace Modules\User\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\User\app\Data\UserData;
use Modules\User\app\Repositories\User\UserRepository;
use Modules\User\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
  public function __construct(protected UserRepository $userRepository)
    {
        $this->setActive('hr');
        $this->setActive('users');
    }

    public function index()
    {
        $model = User::type('user')->paginate(config('core.page_size'));
        return view('user::.admin.user.index', compact('model'));
    }

    public function store(StoreUserRequest $request)
    {
        $userData = UserData::validateAndCreate($request->all());
        $this->userRepository->store($userData);
        return redirect()->route('admin.users.index');
    }


    public function update(Request $request, $id)
    {
        $userData = UserData::validateAndCreate($request->all());
        $user = User::findOrFail($id);
        $this->userRepository->update($userData, $user);
        return redirect()->route('admin.users.index');
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
