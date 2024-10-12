<?php

declare(strict_types=1);

use Novara\Base\Autoload\Loader;

Loader::register(new class {
    public const string PREFIX = 'Novara\\DynamicReadonlyClasses\\';
    public const string DIRECTORY = __DIR__ . '/src';
});
