<?php

namespace OceanApplications\HttpAssertInSequence;

use Illuminate\Http\Client\Factory as ClientFactory;
use PHPUnit\Framework\Assert as PHPUnit;

class Factory extends ClientFactory
{
    /**
     * Assert that a specific request / response pair was recorded matching a given truth test.
     *
     * @param callable $callback
     * @param int $index
     * @return void
     */
    public function assertSentInSequence($callback, $index)
    {
        PHPUnit::assertTrue(
            $callback($this->recorded[$index][0], $this->recorded[$index][1]),
            "An expected request was not recorded at index {$index}."
        );
    }

}
