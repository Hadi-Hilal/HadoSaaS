<?php

namespace Modules\Support\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Core\Http\Requests\DeleteMultiRequest;
use Modules\Support\Models\Subscriber;

class SubscriberController extends Controller {

    public function __construct() {
        $this->setActive('support');
        $this->setActive('subscribers');
    }

    public function index() {
        $model = Subscriber::latest()->paginate(config('core.page_size'));
        return view('support::admin.subscriber.index', compact('model'));
    }

    public function deleteMulti(DeleteMultiRequest $request) {
        Subscriber::destroy($request->ids);
        session()->flushMessage(true);
        return redirect()->back();
    }
}
