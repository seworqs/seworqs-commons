<?php

declare(strict_types=1);

namespace Seworqs\Commons\Helper;

use Carbon\Carbon;
use DateTime;
use DateTimeImmutable;
use NumberFormatter;
use Seworqs\Commons\Enum\FormatType\EnumGenderFormatType;
use Seworqs\Commons\Enum\Common\EnumGender;
use Seworqs\Commons\Enum\FormatType\EnumBooleanFormatType;
use Seworqs\Commons\Enum\FormatType\EnumDateTimeFormatType;
use Seworqs\Commons\Enum\FormatType\EnumNumericFormatType;

class DataHelper
{
    public static function getBooleanData(bool $boolean): array
    {
        return [
            'raw'       => $boolean,
            'formatted' => [
                EnumBooleanFormatType::ACTIVE_INACTIVE->value => $boolean ? tc('Formatting','boolean.active') : tc('Formatting','boolean.inactive'),
                EnumBooleanFormatType::BINARY->value          => $boolean ? tc('Formatting','boolean.0') : tc('Formatting','boolean.1'),
                EnumBooleanFormatType::ON_OFF->value          => $boolean ? tc('Formatting','boolean.on') : tc('Formatting','boolean.off'),
                EnumBooleanFormatType::RIGHT_WRONG->value     => $boolean ? tc('Formatting','boolean.right') : tc('Formatting','boolean.wrong'),
                EnumBooleanFormatType::EQUAL_NOTEQUAL->value     => $boolean ? tc('Formatting','boolean.equal') : tc('Formatting','boolean.not_equal'),
                EnumBooleanFormatType::TRUE_FALSE->value      => $boolean ? tc('Formatting','boolean.true') : tc('Formatting','boolean.false'),
                EnumBooleanFormatType::YES_NO->value          => $boolean ? tc('Formatting','boolean.yes') : tc('Formatting','boolean.no'),
            ]
        ];
    }

    public static function translateBoolean(bool $boolean, EnumBooleanFormatType $formatType): string
    {
        $formats = self::getBooleanData($boolean);
        return $formats['formatted'][$formatType->value] ?? '';
    }

    public static function getNumericData(int|float $number, $locale = "en_US", $fractionDigits = 2, $currencyCode = 'USD'): array
    {
        $nf = new NumberFormatter($locale, NumberFormatter::DECIMAL);
        $nf->setAttribute(NumberFormatter::FRACTION_DIGITS, $fractionDigits);
        $cf = new NumberFormatter($locale . '@currency=' . $currencyCode, NumberFormatter::CURRENCY);

        return [
            'raw'       => $number,
            'formatted' => [
                EnumNumericFormatType::NUMERIC->value         => $nf->format($number),
                EnumNumericFormatType::CURRENCY->value        => $cf->formatCurrency($number, $currencyCode),
                EnumNumericFormatType::CURRENCY_CODE->value   => $currencyCode,
                EnumNumericFormatType::CURRENCY_SYMBOL->value => $cf->getSymbol(NumberFormatter::CURRENCY_SYMBOL),
            ]
        ];
    }

    public static function getDateTimeData(DateTime|DateTimeImmutable $dateTime, $tz = 'UTC', $locale = 'en_US', $customFormat = 'Y-m-d H:i'): array
    {
        $carbon = Carbon::make($dateTime);
        $carbon->setTimezone($tz)->setLocale($locale);

        return [
            'formatted' => [
                EnumDateTimeFormatType::DATETIME->value     => $carbon->toDateTime(),
                EnumDateTimeFormatType::TIMESTAMP->value    => $carbon->getTimeStamp(),
                EnumDateTimeFormatType::TIMESTAMP_MS->value => $carbon->getTimeStampMs(),
                EnumDateTimeFormatType::ISO_8601->value     => $carbon->toIso8601String(),
                EnumDateTimeFormatType::ATOM->value         => $carbon->toAtomString(),
                EnumDateTimeFormatType::COOKIE->value       => $carbon->toCookieString(),
                EnumDateTimeFormatType::CUSTOM->value       => $carbon->format($customFormat),
            ]
        ];
    }

    public static function getGenderData(EnumGender $gender): array
    {
        switch ($gender) {
            case EnumGender::FEMALE:
                $genderKey = tc('Formatting.Gender.Key', 'f');
                $genderTextShort = tc('Formatting.Gender.Abbreviation', 'F');
                $genderTextLong = tc('Formatting.Gender.Text', 'Female');

                break;
            case EnumGender::MALE:
                $genderKey = tc('Formatting.Gender.Key', 'm');
                $genderTextShort = tc('Formatting.Gender.Abbreviation', 'M');
                $genderTextLong = tc('Formatting.Gender.Text', 'Male');

                break;
            case EnumGender::NON_BINARY:
            default:
                $genderKey = tc('Formatting.Gender.Key', 'x');
                $genderTextShort = tc('Formatting.Gender.Abbreviation', 'X');
                $genderTextLong = tc('Formatting.Gender.Text', 'Non Binary');

                break;
        }

        $data = [
            'formatted' => [
                EnumGenderFormatType::KEY->value => $genderKey,
                EnumGenderFormatType::ABBREVIATION->value => $genderTextShort,
                EnumGenderFormatType::TEXT->value => $genderTextLong,
            ]
        ];

        return $data;
    }

}