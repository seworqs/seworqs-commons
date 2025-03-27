<?php

use PHPUnit\Framework\TestCase;
use Seworqs\Commons\Enum\Versioning\EnumBumpPreRelease;
use Seworqs\Commons\Enum\Versioning\EnumBumpType;
use Seworqs\Commons\Helper\VersioningHelper;

class VersioningHelperTest extends TestCase
{
    public function testVersioningProcess()
    {
        $version = '0.0.1';

        $version = VersioningHelper::bumpSemanticVersion($version, EnumBumpType::PATCH);
        $this->assertEquals('0.0.2', $version);

        $version = VersioningHelper::bumpSemanticVersion($version, EnumBumpType::PATCH);
        $this->assertEquals('0.0.3', $version);

        $version = VersioningHelper::bumpSemanticVersion($version, EnumBumpType::MINOR);
        $this->assertEquals('0.1.0', $version);

        $version = VersioningHelper::bumpSemanticVersion($version, EnumBumpType::PATCH);
        $this->assertEquals('0.1.1', $version);

        $version = VersioningHelper::bumpSemanticVersion($version, EnumBumpType::MAJOR, EnumBumpPreRelease::DEV);
        $this->assertEquals('1.0.0-dev.1', $version);

        $version = VersioningHelper::bumpSemanticVersion($version, EnumBumpType::ALPHA);
        $this->assertEquals('1.0.0-alpha.1', $version);

        $version = VersioningHelper::bumpSemanticVersion($version, EnumBumpType::ALPHA);
        $this->assertEquals('1.0.0-alpha.2', $version);

        $version = VersioningHelper::bumpSemanticVersion($version, EnumBumpType::BETA);
        $this->assertEquals('1.0.0-beta.1', $version);

        $version = VersioningHelper::bumpSemanticVersion($version, EnumBumpType::RC);
        $this->assertEquals('1.0.0-RC.1', $version);

        $version = VersioningHelper::bumpSemanticVersion($version, EnumBumpType::STABLE);
        $this->assertEquals('1.0.0', $version);
    }
}