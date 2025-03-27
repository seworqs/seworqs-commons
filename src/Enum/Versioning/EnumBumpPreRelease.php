<?php

namespace Seworqs\Commons\Enum\Versioning;

use Seworqs\Commons\Enum\TranslatableEnumInterface;

enum EnumBumpPreRelease: string implements TranslatableEnumInterface
{
    case DEV = 'dev';
    case ALPHA = 'alpha';
    case BETA  = 'beta';
    case RC    = 'RC';

    public function getValue(): string
    {
        return $this->value;
    }

    public function getTranslatedString(): string
    {
        return match ($this) {
            self::DEV => tc('Enum.Versioning.PreRelease', 'Dev'),
            self::ALPHA => tc('Enum.Versioning.PreRelease', 'Alpha'),
            self::BETA => tc('Enum.Versioning.PreRelease', 'Beta'),
            self::RC => tc('Enum.Versioning.PreRelease', 'RC'),
        };
    }
}