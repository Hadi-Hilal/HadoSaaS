<?php

if (!function_exists('userType')) {
    function userType() {
        if (auth()->check()) {
            return auth()->user()->type;
        }
        return null;
    }
}
