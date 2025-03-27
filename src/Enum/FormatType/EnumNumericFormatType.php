<?php

namespace Seworqs\Commons\Enum\FormatType;

use Seworqs\Commons\Enum\TranslatableEnumInterface;

enum EnumNumericFormatType: string implements TranslatableEnumInterface
{

    case NUMERIC         = 'numeric';
    case CURRENCY        = 'currency';
    case CURRENCY_CODE   = 'currency_code';
    case CURRENCY_SYMBOL = 'currency_symbol';

    public function getValue(): string
    {
        return $this->value;
    }

    public function getTranslatedString(): string
    {
        return match ($this) {
            self::NUMERIC => tc('Enum.FormatType.Numeric', 'Numeric'),
            self::CURRENCY => tc('Enum.FormatType.Numeric', 'Currency'),
            self::CURRENCY_CODE => tc('Enum.FormatType.Numeric', 'Currency Code'),
            self::CURRENCY_SYMBOL => tc('Enum.FormatType.Numeric', 'Currency Symbol'),
        };
    }
}