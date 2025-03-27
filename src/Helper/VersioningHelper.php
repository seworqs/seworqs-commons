<?php

namespace Seworqs\Commons\Helper;

use Seworqs\Commons\Enum\Versioning\EnumBumpPreRelease;
use Seworqs\Commons\Enum\Versioning\EnumBumpType;

class VersioningHelper
{

    public static function bumpSemanticVersion(string $currentVersion, EnumBumpType $type, ?EnumBumpPreRelease $preRelease = null): string
    {

        $availableTypes = [
            EnumBumpType::DEV->value  => 1,
            EnumBumpType::ALPHA->value  => 2,
            EnumBumpType::BETA->value   => 3,
            EnumBumpType::RC->value     => 4,
            EnumBumpType::STABLE->value => 5,
            EnumBumpType::PATCH->value  => 6,
            EnumBumpType::MINOR->value  => 7,
            EnumBumpType::MAJOR->value  => 8
        ];
        $availablePreReleases = [
            EnumBumpPreRelease::DEV->value => 1,
            EnumBumpPreRelease::ALPHA->value => 2,
            EnumBumpPreRelease::BETA->value  => 3,
            EnumBumpPreRelease::RC->value    => 4
        ];

        $parts = explode('-', $currentVersion);
        [$major, $minor, $patch] = explode('.', $parts[0]) + [0, 0, 0];
        $pre = $parts[1] ?? '';

        // Is the current version a pre release [dev|alpha|beta|RC]?
        if ($pre) {

            // Is a pre release requested?
            if ($preRelease) {
                throw new \Exception('Can not use a pre-release on a pre-release version.');
            }

            // Get pre release info.
            [$preType, $preSeq] = explode('.', $pre);

            // Check whether the requested type is ok.
            if ($availableTypes[$type->value] < $availableTypes[$preType]) {
                throw new \Exception("We can not go backwards in version ($currentVersion => $type->value)");
            }
        }

        switch ($type) {
            case EnumBumpType::MAJOR:
                $major++;
                $minor = 0;
                $patch = 0;
                $pre = $preRelease ? $preRelease->value . '.1' : '';
                break;
            case EnumBumpType::MINOR:
                $minor++;
                $patch = 0;
                $pre = $preRelease ? $preRelease->value . '.1' : '';
                break;
            case EnumBumpType::PATCH:
                $patch++;
                $pre = $preRelease ? $preRelease->value . '.1' : '';
                break;
            case EnumBumpType::DEV:
            case EnumBumpType::ALPHA:
            case EnumBumpType::BETA:
            case EnumBumpType::RC:
                if ($pre && strpos($pre, $type->value) === 0) {
                    $number = intval(substr($pre, strlen($type->value) + 1)) + 1;
                    $pre = $type->value . '.' . $number;
                } else {
                    $pre = $type->value . '.1';
                }
                break;
            case EnumBumpType::STABLE:
                if (!$pre) {
                    throw new \Exception("Version ($currentVersion) already stable.");
                }

                $pre = '';
                break;
        }

        $newVersion = implode('.', [$major, $minor, $patch]);
        if ($pre !== '') {
            $newVersion .= '-' . $pre;
        }

        return $newVersion;
    }
}