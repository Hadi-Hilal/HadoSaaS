<?php

namespace Modules\Support\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Core\Http\Requests\DeleteMultiRequest;
use Modules\Support\Models\ContactForm;

class ContactFormController extends Controller {

    public function __construct() {
        $this->setActive('support');
        $this->setActive('contact_forms');
    }

    public function index() {
        $model = ContactForm::latest()->paginate(config('core.page_size'));
        return view('support::admin.contact_form.index', compact('model'));
    }

    public function deleteMulti(DeleteMultiRequest $request) {
        ContactForm::destroy($request->ids);
        session()->flushMessage(true);
        return redirect()->back();
    }
}
