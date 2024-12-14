<?php

namespace App\Http\Middleware;

use App;
use Module;
use Inertia\Middleware;
use Illuminate\Http\Request;
use Modules\Base\Models\Settings;

class HandleInertiaRequests extends Middleware {
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */

    public function share(Request $request): array {

        return array_merge(parent::share($request), [
            'appName' => config('app.name'),
            'csrf' => csrf_token(),
            'asset_path' => asset('/'),
            'storage_path' => asset('storage').'/',
            'locale' => App::currentLocale(),
            'translations' => $this->getTranslations(),
            'settings' => Settings::pluck('value', 'key'),
            'auth' => fn() => $request->user()
                ? $request->user()->only('id', 'name', 'email', 'type')
                : null,
        ]);
    }

    public function getTranslations(): array {

        $modules = Module::all();

        $locale = app()->getLocale();
        $translations = [];

        if ($locale === 'en') {
            return $translations;
        }

        // Iterate through each module to process the language file
        foreach ($modules as $module) {
            $modulePath = $module->getPath(); // Path to the module
            $langFilePath = $modulePath."/lang/$locale.json";

            if (file_exists($langFilePath)) {
                // Decode the JSON file and merge with translations
                $fileContent = json_decode(file_get_contents($langFilePath), true);

                if (is_array($fileContent)) {
                    $translations = array_merge($translations, $fileContent);
                }
            }
        }

        return $translations;
    }
}
