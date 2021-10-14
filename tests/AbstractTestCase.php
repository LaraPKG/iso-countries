<?php

declare(strict_types=1);

namespace LaraPKG\IsoCountries\Tests;

use LaraPKG\IsoCountries\Countries;
use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{
    protected Countries $countries;

    /**
     * Called when the test suite is initialised.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->countries = new Countries();
    }
}
