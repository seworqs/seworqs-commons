<?php

declare(strict_types=1);

namespace Seworqs\Commons\I18n\Translator;

use Laminas\I18n\Translator\Translator as LaminasTranslator;

class Translator extends LaminasTranslator
{
    public function hasDirectTranslation(string $message, ?string $textDomain = 'default', ?string $locale = null): bool
    {
        $locale      = $locale === '' ? null : $locale;
        $locale      = $locale ?? $this->getLocale();

        $translation = $this->getTranslatedMessage($message, $locale, $textDomain);

        return $translation !== null && $translation !== '';
    }

    public function translate($message, $textDomain = 'default', $locale = null): string
    {
        $locale      = $locale === '' ? null : $locale;
        $locale      = $locale ?? $this->getLocale();

        return $this->translateContext('', $message, $textDomain, $locale);
//        // Try with locale
//        if ($this->hasDirectTranslation($message, $textDomain, $locale)) {
//            return parent::translate($message, $textDomain, $locale);
//        }
//
//        // Try with language only.
//        $language = strstr($locale, '_', true);
//        if ($language && $this->hasDirectTranslation($message, $textDomain, $language)) {
//            return parent::translate($message, $textDomain, $language);
//        }
//
//        // Use fallback.
//        return parent::translate($message, $textDomain, $this->getFallbackLocale());
    }

    public function translateContext($context, $message, $textDomain = 'default', $locale = null): string
    {
        $locale      = $locale === '' ? null : $locale;
        $locale      = $locale ?? $this->getLocale();

        if ($context) {
            $messageToUse = $context . "\x04" . $message;
        } else {
            $messageToUse = $message;
        }

        // Try with locale
        if ($this->hasDirectTranslation($messageToUse, $textDomain, $locale)) {
            return parent::translate($messageToUse, $textDomain, $locale);
        }

        // Try with language only.
        $language = strstr($locale, '_', true);
        if ($language && $this->hasDirectTranslation($messageToUse, $textDomain, $language)) {
            return parent::translate($messageToUse, $textDomain, $language);
        }

        // We could make some logic to have another fallback:
        // Search for message without context.

        // Use fallback.
        return parent::translate($messageToUse, $textDomain, $this->getFallbackLocale());
    }

    public function translatePlural($singular, $plural, $number, $textDomain = 'default', $locale = null): string
    {
        $locale      = $locale === '' ? null : $locale;
        $locale      = $locale ?? $this->getLocale();

        // Try to use complete language (eg. nl_NL)
        if ($this->hasDirectTranslation($singular, $textDomain, $locale)) {
            return parent::translatePlural($singular, $plural, $number, $textDomain, $locale);
        }

        // Try to use language without region (eg. nl)
        $language = strstr($locale, '_', true);
        if ($language && $this->hasDirectTranslation($singular, $textDomain, $language)) {
            return parent::translatePlural($singular, $plural, $number, $textDomain, $language);
        }

        // Use fallback locale
        return parent::translatePlural($singular, $plural, $number, $textDomain, $this->getFallbackLocale());
    }
}
