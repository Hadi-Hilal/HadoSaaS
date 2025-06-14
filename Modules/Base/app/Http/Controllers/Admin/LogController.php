<?php

namespace Modules\Base\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Base\Models\LogDb;
use Modules\Core\Http\Requests\DeleteMultiRequest;

class LogController extends Controller
{
    public function __construct()
    {
        $this->setActive('logs');
    }

    public function index()
    {

        $model = LogDb::filter()->latest()->paginate(config('core.page_size'));

        return view('base::admin.log.index', compact('model'));
    }

    public function show(LogDb $log)
    {
        return view('base::admin.log.show', compact('log'));
    }

    public function deleteMulti(DeleteMultiRequest $request)
    {
        LogDb::destroy($request->input('ids'));
        session()->flushMessage(true);

        return back();
    }
}
