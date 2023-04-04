<?php

declare(strict_types=1);

namespace Zorachka\Clock;

use DateTimeImmutable;
use DateTimeZone;
use Exception;
use Psr\Clock\ClockInterface;

final class TimeZoneAwareClock implements ClockInterface
{
    private DateTimeZone $timezone;

    public function __construct(DateTimeZone $timezone)
    {
        $this->timezone = $timezone;
    }

    /**
     * @throws Exception
     */
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable('now', $this->timezone);
    }
}
