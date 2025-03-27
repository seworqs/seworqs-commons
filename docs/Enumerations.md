# Enumerations

We all use enumerations. Like in a status or to distinguish genders for example. But the display values are not always the same in different languages.

The translatable enumerations implement a TranslatableEnumInterface. This will implement ```getValue()``` and ```getTranslatedString()```.

In all examples we assume using a 'nl_*' locale (nl, nl_NL, ...) with a language file in place. 

You can use the ```getValue()``` and ```getTranslatedString()``` on the enumerations to get the value or the translated value. Also look at the [DataHelper](Helpers.md#datahelper)

## Common

Here you will find common enumerations.

### EnumGender

- EnumGender::FEMALE
- EnumGender::MALE
- EnumGender::NON_BINARY
- EnumGender::UNKNOWN


## FormatType
WHen you want to translate, you can have several formats. When we look at a boolean, it can be ```True/False```, but also ```Yes/No``` when displaying the boolean.
That is why we have FormatType. These types itself are also translatable.

To see this in action, please check the [DataHelper](Helpers.md#datahelper) where the real magic happens.

### BooleanFormatType

- EnumBooleanFormatType::ACTIVE_INACTIVE
- EnumBooleanFormatType::BINARY
- EnumBooleanFormatType::EQUAL_NOTEQUAL
- EnumBooleanFormatType::ON_OFF
- EnumBooleanFormatType::RIGHT_WRONG
- EnumBooleanFormatType::TRUE_FALSE
- EnumBooleanFormatType::YES_NO

### EnumDateTImeFormatType
- EnumDateTImeFormatType::ATOM
- EnumDateTImeFormatType::COOKIE
- EnumDateTImeFormatType::CUSTOM
- EnumDateTImeFormatType::DATETIME 
- EnumDateTImeFormatType::ISO_8601
- EnumDateTImeFormatType::TIMESTAMP
- EnumDateTImeFormatType::TIMESTAMP_MS

### EnumGenderFormatType

- EnumGenderFormatType::ABBREVIATION
- EnumGenderFormatType::KEY
- EnumGenderFormatType::TEXT

### EnumNumericFormatType
- EnumNumericFormatType::CURRENCY
- EnumNumericFormatType::CURRENCY_CODE
- EnumNumericFormatType::CURRENCY_SYMBOL
- EnumNumericFormatType::NUMERIC

## String

### EnumCase
EnumCase::CAMEL
EnumCase::KEBAB
EnumCase::LOWER
EnumCase::PASCAL
EnumCase::SNAKE
EnumCase::SNAKE_SCREAMING
EnumCase::UPPER

### EnumChars
EnumChars::ALPHA
EnumChars::NUMERIC
EnumChars::SPECIAL
EnumChars::ALPHANUMERIC_SPECIAL
EnumChars::ALPHANUMERIC

## Versioning

### EnumBumpPreRelease
EnumBumpPreRelease::DEV
EnumBumpPreRelease::ALPHA
EnumBumpPreRelease::BETA
EnumBumpPreRelease::RC

### EnumBumpType
EnumBumpType::MAJOR
EnumBumpType::MINOR
EnumBumpType::PATCH
EnumBumpType::DEV
EnumBumpType::ALPHA
EnumBumpType::BETA
EnumBumpType::RC
EnumBumpType::STABLE