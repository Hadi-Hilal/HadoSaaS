<?php

namespace Modules\Core\Traits;


use Throwable;

/**
 * Helper trait for executing repository operations with exception  handling.
 */
trait ExceptionHandlerTrait {
    public function execute(callable $callback): mixed {
        try {
            return $callback();
        } catch (Throwable $throwable) {
            session()->flushMessage(false, __('An Error Occurred!'), $throwable);
            return null;
        }
    }
}
