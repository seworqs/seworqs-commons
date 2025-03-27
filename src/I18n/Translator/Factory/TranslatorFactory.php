<?php

declare(strict_types=1);

namespace Seworqs\Commons\I18n\Translator\Factory;

use Seworqs\Commons\I18n\Translator\Translator;

class TranslatorFactory
{
    public static function createStandAlone(): Translator
    {

        $config = [
            'translator' => [
                'translation_file_patterns' => [
                        [
                            self::getTranslationFilePattern()
                        ]
                    ]
            ]
        ];

        return Translator::factory($config);
    }

    public static function getTranslationFilePattern(): array
    {
        return [
            'type' => 'gettext',
            'base_dir' => dirname(__DIR__, 4) . '/languages',
            'pattern' => '%s/LC_MESSAGES/messages.mo'
        ];
    }
}
