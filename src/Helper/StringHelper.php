<?php

namespace Seworqs\Commons\Helper;

use Seworqs\Commons\Enum\String\EnumChars;

class StringHelper
{

    ////////////////////
    // PUBLIC METHODS
    ////////////////////

    public static function toLowerCase(string $string): string
    {
        if (function_exists('mb_strtolower')) {
            return mb_strtolower($string, 'UTF-8');
        } else {
            return strtolower($string);
        }
    }

    public static function toUpperCase(string $string): string
    {
        if (function_exists('mb_strtoupper')) {
            return mb_strtoupper($string, 'UTF-8');
        } else {
            return strtoupper($string);
        }
    }

    public static function toPascalCase(string $string, bool $leaveDelimiter = false, string $delimiter = "/"): string
    {

        $result = '';
        $string = trim($string, ' _-/\\');
        if (strpos($string, $delimiter)) {
            $segments = explode($delimiter, $string);
            foreach ($segments as $segment) {
                $subsegments = preg_split("/[ _-]/", $segment);
                foreach ($subsegments as $subsegment) {
                    $result .= ucfirst($subsegment);
                }
                if ($leaveDelimiter) {
                    $result .= $delimiter;
                }
            }
            $result = trim($result, $delimiter);
        } else {
            $segments = preg_split("/[ _-]/", $string);
            foreach ($segments as $segment) {
                $result .= ucfirst($segment);
            }
        }

        return $result;
    }

    public static function toCamelCase(string $string, bool $leaveDelimiter = false, string $delimiter = "/"): string
    {
        return lcfirst(self::toPascalCase($string, $leaveDelimiter, $delimiter));
    }

    public static function toSnakeCase(string $string, bool $leaveDelimiter = false, string $delimiter = "/"): string
    {
        return self::toSnakeOrKebabCase($string, '_', $leaveDelimiter, $delimiter);
    }

    public static function toKebabCase(string $string, bool $leaveDelimiter = false, string $delimiter = "/"): string
    {
        return self::toSnakeOrKebabCase($string, '-', $leaveDelimiter = false, $delimiter);
    }

    public static function createRandomString(int $length = 10, string|EnumChars $chars = EnumChars::ALPHANUMERIC): string
    {
        $randomString = '';
        $availableChars = $chars instanceof EnumChars ? $chars->getValue() : $chars;
        $charactersLength = strlen($availableChars);

        if ($charactersLength === 0) {
            throw new \InvalidArgumentException('We need some characters to create a random string.');
        }

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $availableChars[random_int(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    ////////////////////
    // PROTECTED METHODS
    ////////////////////
    protected static function toSnakeOrKebabCase(string $string, string $separator, bool $leaveSlashes = false, string $delimiter = "/"): string
    {

        $result = '';

        // PascalCase input.
        $pascalCase = self::toPascalCase($string, $leaveSlashes, $delimiter);

        if ($leaveSlashes) {
            $words = explode($delimiter, $pascalCase);

            foreach ($words as $word) {
                $result .= self::baseSnakeOrKebab($word, $separator) . $delimiter;
            }

            $result = trim($result, $delimiter);
        } else {
            $result = self::baseSnakeOrKebab($pascalCase, $separator);
        }

        return $result;
    }


    ////////////////////
    // PRIVATE METHODS
    ////////////////////

    private static function baseSnakeOrKebab(string $string, string $separator): string
    {

        $v = preg_split('/([A-Z])/', $string, false, PREG_SPLIT_DELIM_CAPTURE);

        $a = array();
        array_shift($v);
        for ($i = 0; $i < count($v); ++$i) {
            if ($i % 2) {
                if (function_exists('mb_strtolower')) {
                    $a[] = mb_strtolower($v[$i - 1] . $v[$i], 'UTF-8');
                } else {
                    $a[] = strtolower($v[$i - 1] . $v[$i]);
                }
            }
        }

        return str_replace($separator . $separator, $separator, implode($separator, $a));
    }
}
