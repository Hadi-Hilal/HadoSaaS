<?php

namespace Modules\Base\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Base\Models\Seo;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->setActive('settings');
    }

    public function index()
    {
        $this->setActive('seo');
        $seo = Seo::pluck('value', 'key');

        return view('base::admin.seo.index', compact('seo'));
    }

    public function store(Request $request)
    {

        if ($request->filled('data')) {
            foreach ($request->input('data') as $key => $value) {
                if ($value) {
                    Seo::set($key, $value);
                }

            }
        }
        session()->flushMessage(true);

        return back();
    }
}
