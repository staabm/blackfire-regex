<?php
require_once __DIR__ . '/vendor/autoload.php';

$lorem = file('lorem');
foreach($lorem as $line) {
    for ($i= 0; $i < 500; $i++) {
        if (\Nette\Utils\Strings::match($line, '/['. $i .']*/') !== null) {

        }
    }

    foreach($lorem as $line) {
        if (\Nette\Utils\Strings::match($line, '([\000-\037])') !== null) {

        }
    }
}

printf(
    'Used memory: %s'.PHP_EOL,
    BytesHelper::bytes(memory_get_peak_usage(true)),
);