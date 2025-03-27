<?php

namespace Seworqs\Commons\Enum\FormatType;

use Seworqs\Commons\Enum\TranslatableEnumInterface;

enum EnumDateTimeFormatType: string implements TranslatableEnumInterface
{

    case DATETIME     = 'datetime';
    case ATOM         = 'atom';
    case COOKIE       = 'cookie';
    case ISO_8601     = 'iso_8601';
    case TIMESTAMP    = 'timestamp';
    case TIMESTAMP_MS = 'timestamp_ms';
    case CUSTOM       = 'custom';

    public function getValue(): string
    {
        return $this->value;
    }

    public function getTranslatedString(): string
    {
        return match ($this) {
            self::DATETIME => tc('Enum.FormatType.DateTime', 'DateTime'),
            self::ATOM => tc('Enum.FormatType.DateTime', 'Atom'),
            self::COOKIE => tc('Enum.FormatType.DateTime', 'Cookie'),
            self::ISO_8601 => tc('Enum.FormatType.DateTime', 'ISO-8601'),
            self::TIMESTAMP => tc('Enum.FormatType.DateTime', 'Timestamp'),
            self::TIMESTAMP_MS => tc('Enum.FormatType.DateTime', 'Timestamp (ms)'),
            self::CUSTOM => tc('Enum.FormatType.DateTime', 'Custom'),
        };
    }
}