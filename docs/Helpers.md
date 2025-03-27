# Helpers

We all could use some help now and then. That is why we have some helpers here!

## DataHelper

The DataHelper will help you to get an formatted string according to the format type of an enumeration.

### getBooleanData(bool \$boolean): array

Get all formats for a boolean.

### translateBoolean(bool \$boolean, EnumBooleanFormatType formatType): string

Get specific format for a boolean.

### getNumericData(int|float \$number, \$locale = "en_US", \$fractionDigits = 2, \$currencyCode = 'USD'): array

Get all formats for a numeric value.

### getDateTimeData(DateTime|DateTimeImmutable \$dateTime, \$tz = 'UTC', \$locale = 'en_US', \$customFormat = 'Y-m-d H:i'): array

Get all formats for a datetime value.

### getGenderData(EnumGender \$gender): array

Get all formats for gender enum.


## FinancialHelper

Sometimes you will find yourself making repetative calculations. Think about percentages (like VAT calculations).

### fromExToIn(float|int \$amount, float|int \$percentage): float|int

Add the percentage to an base amount. Like excluding VAT to including VAT.

### fromInToEx(float|int \$amount, float|int \$percentage): float|int

Remove the percentage from an amount. Like including VAT to excluding VAT.

### getInExCalculations(\$amount, \$percentage, \$count = 1)

Get an array of numbers. You will get all calculations in an array, even with a multiplier!

```php
// For example: getInExCalculations(10, 21, 5)
[
    'input'      => [
        'amount'     => 5,
        'percentage' => 21,
        'count'      => 5
    ],
    'fromExToIn' => [
        'ex'         => 10,
        'in'         => 12.1,
        'multiplied' => [
            'ex' => 50,
            'in' => 60.5,
        ]
    ],
    'fromInToEx' => [
        'ex'         => 8.26446281,
        'in'         => 10,
        'multiplied' => [
            'ex' => 41.32231405,
            'in' => 50,
        ]
    ]
]
```

## StringHelper

With coding we use a lot of different string formats. Uppercase, lowercase, pascalcase. We have them in one place!
Also we have a simple "random" string creator where you can use your own chars to choose from.

### toLowerCase(string \$string): string
### toUpperCase(string \$string): string
### toPascalCase(string \$string, bool \$leaveDelimiter = false, string \$delimiter = "/"): string
### toCamelCase(string \$string, bool \$leaveDelimiter = false, string \$delimiter = "/"): string
### toSnakeCase(string \$string, bool \$leaveDelimiter = false, string \$delimiter = "/"): string
### toKebabCase(string \$string, bool \$leaveDelimiter = false, string \$delimiter = "/"): string
### createRandomString(int \$length = 10, string|EnumChars \$chars = EnumChars::ALPHANUMERIC): string

## VersioningHelper

When working with semantic version numbers, we can bump them to new versions.

### bumpSemanticVersion(string \$currentVersion, EnumBumpType \$type, ?EnumBumpPreRelease \$preRelease = null): string