<?php

declare(strict_types=1);

namespace Seworqs\Commons\Enum\FormatType;

use Seworqs\Commons\Enum\TranslatableEnumInterface;

enum EnumGenderFormatType: string implements TranslatableEnumInterface
{
    case KEY = 'key';
    case ABBREVIATION = 'text_short';
    case TEXT = 'text_long';

    public function getValue(): string
    {
        return $this->value;
    }

    public function getTranslatedString(): string
    {
        return match ($this) {
            self::KEY => tc('Enum.FormatType.Gender', 'Key'),
            self::ABBREVIATION => tc('Enum.FormatType.Gender', 'Abbreviation'),
            self::TEXT => tc('Enum.FormatType.Gender', 'Text'),
        };
    }
}
