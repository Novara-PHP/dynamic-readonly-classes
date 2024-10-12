<?php

declare(strict_types=1);

namespace Novara\DynamicReadonlyClasses;

use Novara\Base\Novara;
use Novara\Base\PureStaticTrait;

final class DRCFactory
{
    use PureStaticTrait;

    /**
     * A disgustingly stupid function using eval to dynamically create readonly values.
     *
     * This is evil and unholy on many levels... there is no "but".
     * The use should still be safe.
     */
    public static function create(): object
    {
        return Novara::Call::pass(
            Novara::Call::args(
                [
                    'extends',
                    'constants',
                ],
                func_get_args(),
            ),
            fn () => eval(
                sprintf(
                    <<<EOF
                        return new class %s{
                            %s
                        };
                        EOF,
                    func_get_arg(0)->extends
                        ? 'extends ' . func_get_arg(0)->extends
                        : '',
                    implode(PHP_EOL, array_map(
                        fn () => Novara::Call::pass(
                            Novara::Call::args(
                                [
                                    'name',
                                    'value',
                                ],
                                func_get_args(),
                            ),
                            fn () => '    public const ' . preg_replace('/\W/', '', func_get_arg(0)->name)
                                . ' = ' . var_export(func_get_arg(0)->value, true) . ';',
                        ),
                        array_keys(func_get_arg(0)->constants),
                        array_values(func_get_arg(0)->constants),
                    )),
                )
            ),
        );
    }
}
