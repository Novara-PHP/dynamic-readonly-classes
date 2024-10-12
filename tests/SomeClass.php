<?php

namespace Novara\DynamicReadonlyClasses\Tests;

abstract class SomeClass
{
    public function test(): string
    {
        return static::TEST;
    }
}
