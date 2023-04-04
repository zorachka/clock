<?php

declare(strict_types=1);

namespace Zorachka\Clock;

use DateTimeZone;
use Webmozart\Assert\Assert;

final class ClockConfig
{
    private string $timezone;

    private function __construct(string $timezone)
    {
        Assert::inArray($timezone, DateTimeZone::listIdentifiers(DateTimeZone::ALL));
        $this->timezone = $timezone;
    }

    /**
     * @return static
     */
    public static function withDefaults(
        string $timezone = 'UTC',
    ): self {
        return new self($timezone);
    }

    /**
     * @return $this
     */
    public function withTimezone(string $timezone): self
    {
        Assert::inArray($timezone, DateTimeZone::listIdentifiers(DateTimeZone::ALL));
        $new = clone $this;
        $new->timezone = $timezone;

        return $new;
    }

    public function timezone(): string
    {
        return $this->timezone;
    }
}
