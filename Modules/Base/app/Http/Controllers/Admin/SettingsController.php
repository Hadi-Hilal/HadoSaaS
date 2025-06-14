<?php

namespace Modules\Base\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Base\Models\Settings;
use Modules\Core\Traits\FileTrait;

class SettingsController extends Controller
{
    use FileTrait;

    public function __construct()
    {
        $this->setActive('settings');
    }

    public function index()
    {
        $this->setActive('websiteConfigurations');
        $settings = Settings::pluck('value', 'key');

        return view('base::admin.settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        // Handle uploaded images
        if ($request->hasFile('imgs')) {
            foreach ($request->file('imgs') as $key => $file) {
                $oldFile = Settings::get($key) ?? null;

                $path = $this->upload($file, 'settings', $key, $oldFile);

                Settings::set($key, $path);
            }
        }

        // Handle other data settings
        if ($request->filled('data')) {
            foreach ($request->input('data') as $key => $value) {
                Settings::set($key, $value);
            }
        }

        cache()->forget('settings');
        session()->flushMessage(true);

        return back();
    }
}
