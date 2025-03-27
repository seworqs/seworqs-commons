<?php

namespace Seworqs\Commons\Json;

use Adbar\Dot;
use Seworqs\Commons\Enum\Versioning\EnumBumpPreRelease;
use Seworqs\Commons\Enum\Versioning\EnumBumpType;
use Seworqs\Commons\Helper\VersioningHelper;

class JsonEditor
{

    private Dot    $dot;
    private string $filePath;

    ////////////////////
    /// CONSTRUCTOR
    ////////////////////
    public function __construct(string $filePath)
    {
        $this->dot = new Dot();
        $this->reload($filePath);
    }

    ////////////////////
    /// PUBLIC METHODS
    ////////////////////
    public function add(string $key, mixed $value, bool $overwrite = true): self
    {
        if ($overwrite) {
            $this->dot->set($key, $value);
        } else {
            $this->dot->add($key, $value);
        }
        return $this;
    }

    public function addMultiple(array $keyValues, bool $overwrite = false): self
    {
        if ($overwrite) {
            $this->dot->set($keyValues);
        } else {
            $this->dot->add($keyValues);
        }

        return $this;
    }

    public function delete(string $key): self
    {
        $this->dot->delete($key);
        return $this;
    }

    public function deleteMultiple(array $keys): self
    {
        $this->dot->delete($keys);
        return $this;
    }

    public function get(string $key, string $default = null): mixed
    {
        return $this->dot->get($key, $default);
    }

    public function reload(string $filePath): self
    {

        if (file_exists($filePath)) {
            $this->filePath = $filePath;
            $json = file_get_contents($this->filePath);
            $data = json_decode($json, true);
            $this->dot->setArray($data);
        } else {
            throw new \Exception(sprintf('%s does not exist.', $filePath));
        }
        return $this;
    }

    public function save(): self
    {
        return $this->saveAs($this->filePath);
    }

    public function saveAs(string $filePath): self
    {

        // Get dir from path info.
        $dir = pathinfo($filePath, PATHINFO_DIRNAME);

        // Check dir.
        if (!is_dir($dir)) {
            throw new \Exception(sprintf('%s is not a directory.', $filePath));
        }

        // Put contents.
        file_put_contents($filePath, $this->toString(JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        // Reload.
        return $this->reload($this->filePath);
    }

    public function bumpVersion(string $path, EnumBumpType $type, EnumBumpPreRelease $preRelease = null, $overwrite = true): self
    {

        // Get version from given Json path.
        $version = $this->get($path);

        // Bump version.
        $newVersion = VersioningHelper::bumpSemanticVersion($version, $type, $preRelease);

        $this->add($path, $newVersion, $overwrite);

        return $this;
    }

    public function toString(int $flags = JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES): string
    {
        $data = $this->dot->all();
        return json_encode($data, $flags);
    }

    public function toArray(): array
    {
        return $this->dot->all();
    }
}
