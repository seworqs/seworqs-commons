<?php

namespace Seworqs\Commons\Enum\String;

use Seworqs\Commons\Enum\TranslatableEnumInterface;

enum EnumChars: string implements TranslatableEnumInterface
{
    case ALPHA                = 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz';
    case NUMERIC              = '0123456789';
    case SPECIAL              = '!@#%&-_^';
    case ALPHANUMERIC_SPECIAL = 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789!@#%&-_^';
    case ALPHANUMERIC         = 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789';

    public function getValue(): string
    {
        return $this->value;
    }

    public function getTranslatedString(): string
    {
        return match ($this) {
            self::ALPHA => tc('Enum.String.Chars', 'Alpha'),
            self::NUMERIC => tc('Enum.String.Chars', 'Numeric'),
            self::SPECIAL => tc('Enum.String.Chars', 'Special'),
            self::ALPHANUMERIC_SPECIAL => tc('Enum.String.Chars', 'Alphanumeric and Special'),
            self::ALPHANUMERIC => tc('Enum.String.Chars', 'Alphanumeric'),
        };
    }
}
