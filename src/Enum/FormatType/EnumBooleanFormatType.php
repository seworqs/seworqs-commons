<?php

namespace Seworqs\Commons\Enum\FormatType;

use Seworqs\Commons\Enum\TranslatableEnumInterface;

enum EnumBooleanFormatType: string implements TranslatableEnumInterface
{

    case ACTIVE_INACTIVE = 'active_inactive';
    case BINARY          = 'binary';
    case ON_OFF          = 'on_off';
    case RIGHT_WRONG     = 'right_wrong';
    case TRUE_FALSE      = 'true_false';
    case EQUAL_NOTEQUAL  = 'equal_notequal';
    case YES_NO          = 'yes_no';

    public function getValue(): string
    {
        return $this->value;
    }

    public function getTranslatedString(): string
    {
        return match ($this) {
            self::ACTIVE_INACTIVE => tc('Enum.FormatType.Boolean', 'Active/Inactive'),
            self::BINARY => tc('Enum.FormatType.Boolean', 'Binary'),
            self::ON_OFF => tc('Enum.FormatType.Boolean', 'On/Off'),
            self::RIGHT_WRONG => tc('Enum.FormatType.Boolean', 'Right/Wrong'),
            self::EQUAL_NOTEQUAL => tc('Enum.FormatType.Boolean', 'Equal/Not Equal'),
            self::TRUE_FALSE => tc('Enum.FormatType.Boolean', 'True/False'),
            self::YES_NO => tc('Enum.FormatType.Boolean', 'Yes/No'),
        };
    }
}