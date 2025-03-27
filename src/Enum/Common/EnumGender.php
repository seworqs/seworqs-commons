<?php

declare(strict_types=1);

namespace Seworqs\Commons\Enum\Common;

use Seworqs\Commons\Enum\TranslatableEnumInterface;

enum EnumGender: string implements TranslatableEnumInterface
{
    case FEMALE     = 'Female';
    case MALE       = 'Male';
    case NON_BINARY = 'NonBinary';
    case UNKNOWN    = 'Unknown';

    public function getValue(): string
    {
        return $this->value;
    }

    public function getTranslatedString(): string
    {
        return match ($this) {
            self::FEMALE => /* TRANSLATORS: Some hint here. */ tc('Enum.Gender', 'Female'),
            self::MALE => tc('Enum.Gender', 'Male'),
            self::NON_BINARY => tc('Enum.Gender', 'Non Binary'),
            self::UNKNOWN => tc('Enum.Gender', 'Unknown'),
        };
    }
}
