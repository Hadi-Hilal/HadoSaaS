<?php

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Log;
use Session;
use Throwable;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void
    {
        Session::macro('flushMessage', function (bool $condition, ?string $msg = null, ?Throwable $exception = null) {
            session()->flash($condition ? 'success' : 'error', $msg ?? ($condition
                ? __('The Operation Done Successfully')
                : __('An Error Occurred!')));

            if ($exception) {
                Log::error($exception->getMessage());
            }
        });

    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }
}
