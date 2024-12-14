<?php

use Stichoza\GoogleTranslate\Exceptions\LargeTextException;
use Stichoza\GoogleTranslate\Exceptions\RateLimitException;
use Stichoza\GoogleTranslate\Exceptions\TranslationRequestException;
use Stichoza\GoogleTranslate\GoogleTranslate;

if (!function_exists('autoGoogleTranslator')) {
    /**
     * @throws LargeTextException
     * @throws RateLimitException
     * @throws TranslationRequestException
     */
    function autoGoogleTranslator(string $targetLang, string $content) {
        $translator = new GoogleTranslate();
        return $translator->setTarget($targetLang)->translate($content);
    }
}
