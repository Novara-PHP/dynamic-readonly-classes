<?php

use Novara\Base\Autoload\Loader;

require_once __DIR__ . '/vendor/novara/base/src/Autoload/Loader.php';

Loader::register(new class {
    public const string PREFIX = 'Novara\\DynamicReadonlyClasses\\';
    public const string DIRECTORY = __DIR__ . '/src';
});
