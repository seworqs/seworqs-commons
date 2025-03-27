<?php

declare(strict_types=1);

use Seworqs\Commons\I18n\Translator\Registry\TranslatorRegistry;

function cfgt(string $message): string
{
    return $message;
}

function t(string $message, array $params = [], string $textDomain = 'default', ?string $locale = null): string
{
    $translator = TranslatorRegistry::getTranslator();
    $translated = $translator->translate($message, $textDomain, $locale);

    if (! empty($params)) {
        $translated = vsprintf($translated, $params);
    }

    return $translated;
}

function tc(string $context, string $message, array $params = [], string $textDomain = 'default', ?string $locale = null): string
{
    $translator = TranslatorRegistry::getTranslator();
    if (method_exists($translator, 'translateContext')) {
        $translated = $translator->translateContext($context, $message, $textDomain, $locale);
    } else {
        return t($context . "\x04" . $message, $params, $textDomain, $locale);
    }

    if (! empty($params)) {
        $translated = vsprintf($translated, $params);
    }

    return $translated;
}

function t2(string $singular, string $plural, int $number, string $context = 'default', ?string $locale = null): string
{
    $translator = TranslatorRegistry::getTranslator();
    return $translator->translatePlural($singular, $plural, $number, $context, $locale);
}
