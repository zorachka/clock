<?php

declare(strict_types=1);

namespace Zorachka\Clock;

use DateTimeZone;
use Psr\Clock\ClockInterface;
use Psr\Container\ContainerInterface;
use Zorachka\Container\ServiceProvider;

final class ClockServiceProvider implements ServiceProvider
{
    public static function getDefinitions(): array
    {
        return [
            ClockInterface::class => static function (ContainerInterface $container) {
                /** @var ClockConfig $config */
                $config = $container->get(ClockConfig::class);

                return new TimeZoneAwareClock(new DateTimeZone($config->timezone()));
            },
            ClockConfig::class => static fn () => ClockConfig::withDefaults(),
        ];
    }

    public static function getExtensions(): array
    {
        return [];
    }
}
