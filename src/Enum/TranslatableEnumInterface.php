<?php

declare(strict_types=1);

namespace Seworqs\Commons\Enum;

interface TranslatableEnumInterface
{
    public function getValue(): string;

    public function getTranslatedString(): string;
}