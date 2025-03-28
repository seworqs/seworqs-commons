# CHANGELOG (v2)

## v2.1.1
- Updated Composer dependencies for compatibility:
  - `nesbot/carbon` `^3.0` → `~3.7.0`  
    Carbon 3.8+ introduced a hard dependency on `carbonphp/carbon-doctrine-types`, which conflicts with Doctrine DBAL 3.x.
  - `phpunit/phpunit` `^12` → `^11`  
    PHPUnit 12 requires PHP 8.3. Version 11.2 provides full support for PHP 8.1 and 8.2 and aligns with modern PHPUnit testing practices.
- Relaxed PHP requirement:
  - `php` `8.2` → `^8.1`  
    Allows use of this package in projects using PHP 8.1.

## v2.1.0
- `VersioningHelper` supports Composer-compatible versioning (`1.0.0-alpha1` instead of `1.0.0-alpha.1`)
- Updated [VersionHelper documentation](docs/Helpers.md#bumpsemanticversionstring-currentversion-enumbumptype-type-enumbumpprerelease-prerelease--null-string-sequencesplitter---string)

## v2.0.0
A complete rewrite of SEworqs Commons. Please check documentation on how to use the new and improved SEworqs Commons!
