<?php

declare(strict_types=1);

namespace Seworqs\Commons\I18n\Translator\Registry;

use Laminas\I18n\Translator\Translator;

class TranslatorRegistry
{
    private static ?Translator $translator = null;

    public static function setTranslator(Translator $translator): void
    {
        self::$translator = $translator;
    }

    public static function getTranslator(): ?Translator
    {
        if (self::$translator === null) {
            throw new \RuntimeException('Translator has not been set.');
        }

        return self::$translator;
    }
}