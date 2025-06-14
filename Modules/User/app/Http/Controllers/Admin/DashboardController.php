<?php

namespace Modules\User\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller {
    public function index() {
        $this->setActive('dashboard');
        return view('user::admin.dashboard.index');
    }

}
