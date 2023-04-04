<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Zorachka\Example;

/**
 * @internal
 */
final class ExampleTest extends TestCase
{
    public function testSuccess(): void
    {
        $example = new Example();
        $result = $example->do();

        self::assertEquals(42, $result);
    }
}
