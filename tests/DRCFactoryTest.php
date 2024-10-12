<?php

declare(strict_types=1);

namespace Novara\DynamicReadonlyClasses\Tests;

use Novara\DynamicReadonlyClasses\DRCFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DRCFactory::class)]
final class DRCFactoryTest extends TestCase
{
    public static function testCreate(): void
    {
        self::assertSame(
            'Bar',
            DRCFactory::create(null, [
                'Foo' => 'Bar',
            ])::Foo,
        );

        self::assertSame(
            'funny text here',
            DRCFactory::create(SomeClass::class, [
                'TEST' => 'funny text here',
            ])->test(),
        );
    }
}
