<?php

namespace Seworqs\Commons\Enum\Versioning;

use Seworqs\Commons\Enum\TranslatableEnumInterface;

enum EnumBumpType: string implements TranslatableEnumInterface
{
    case MAJOR  = 'major';
    case MINOR  = 'minor';
    case PATCH  = 'patch';
    case DEV    = 'dev';
    case ALPHA  = 'alpha';
    case BETA   = 'beta';
    case RC     = 'RC';
    case STABLE = 'stable';

    public function getValue(): string
    {
        return $this->value;
    }

    public function getTranslatedString(): string
    {
        return match ($this) {
            self::MAJOR => tc('Enum.Versioning.Release', 'Major'),
            self::MINOR => tc('Enum.Versioning.Release', 'Minor'),
            self::PATCH => tc('Enum.Versioning.Release', 'Patch'),
            self::DEV => tc('Enum.Versioning.Release', 'Dev'),
            self::ALPHA => tc('Enum.Versioning.Release', 'Alpha'),
            self::BETA => tc('Enum.Versioning.Release', 'Beta'),
            self::RC => tc('Enum.Versioning.Release', 'RC'),
            self::STABLE => tc('Enum.Versioning.Release', 'Stable'),
        };
    }
}