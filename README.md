# blackfire-regex

## find 1

simple script which runs memory efficient without blackfire, but takes a huge amount of memory when profilling.

my feeling is, this script reproduces a problem I had over and over again, when profilling the PHPStan codebase, in which case blackfire reported too much memory used - especially in Nette/Strings::match() (regex matching)

### repro

checkout https://github.com/staabm/blackfire-regex/commit/10b34994f6873f4b30f33b2f53c115b65a8af91d

### run without blackfire

php nette.php              
Used memory: 4 MB

### run with blackfire

blackfire run php nette.php
Used memory: 4.3 GB

## find 2

running this very similar script takes 1.4 GB when PCRE is involved and only 370 MB with plain addcslashes() - both when running with blackfire.

it takes the very same amount of memory when running without blackfire - just 2 MB

 

### repro

https://github.com/staabm/blackfire-regex/commit/e1d0071398fe933b182a96cd81f89f68a816c358

 
```
➜  blackfire-regex git:(main) ✗ php nette.php
Used memory: 2 MB
➜  blackfire-regex git:(main) ✗ php plain.php
Used memory: 2 MB
➜  blackfire-regex git:(main) ✗ blackfire run php nette.php
Used memory: 1.43 GB
➜  blackfire-regex git:(main) ✗ blackfire run php plain.php
Used memory: 370 MB
```

## Setup 

```
php -v
PHP 8.2.11 (cli) (built: Sep 26 2023 11:11:58) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.2.11, Copyright (c) Zend Technologies
    with blackfire v1.86.3~mac-x64-non_zts82, https://blackfire.io, by Blackfire

blackfire -V
Blackfire version 2.22.0 (c) 2014-2023 Platform.sh (2023-09-28T09:21:28+0000 - dev)
```

running latest macos on a M1 Pro.
