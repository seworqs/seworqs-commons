<?php

namespace Seworqs\Commons\Enum\String;

use Seworqs\Commons\Enum\TranslatableEnumInterface;

enum EnumCase: string implements TranslatableEnumInterface
{
    case UPPER           = 'upper';
    case LOWER           = 'lower';
    case PASCAL          = 'pascal';
    case CAMEL           = 'camel';
    case SNAKE           = 'snake';
    case SNAKE_SCREAMING = 'snake_screaming';
    case KEBAB           = ' kebab';

    public function getValue(): string
    {
        return $this->value;
    }

    public function getTranslatedString(): string
    {
        return match ($this) {
            self::UPPER => tc('Enum.String.Case', 'UPPERCASE'),
            self::LOWER => tc('Enum.String.Case', 'lowercase'),
            self::PASCAL => tc('Enum.String.Case', 'PascalCase'),
            self::CAMEL => tc('Enum.String.Case', 'camelCase'),
            self::SNAKE => tc('Enum.String.Case', 'snake_case'),
            self::SNAKE_SCREAMING => tc('Enum.String.Case', 'SNAKE_CASE_SCREAMING'),
            self::KEBAB => tc('Enum.String.Case', 'kebab-case'),
        };
    }
}