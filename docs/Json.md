# Json

## JsonEditor

When using the JsonEditor, it will be very easy to edit a piece of json. 

When using key(s), use the easy dot-notation, like ```important.title```.

Edit and save the new Json!

### add(string \$key, mixed \$value, bool \$overwrite = true): self
### addMultiple(array \$keyValues, bool \$overwrite = false): self
### delete(string \$key): self
### deleteMultiple(array \$keys): self
### get(string \$key, string \$default = null): mixed
### reload(string \$filePath): self
### save(): self
### saveAs(string \$filePath): self
### bumpVersion(string \$path, EnumBumpType \$type, EnumBumpPreRelease \$preRelease = null, \$overwrite = true): self
### toString(int $flags = JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES): string
### toArray(): array