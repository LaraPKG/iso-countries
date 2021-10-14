<?php

declare(strict_types=1);

namespace LaraPKG\IsoCountries\Tests;

use LaraPKG\IsoCountries\Country;
use LaraPKG\IsoCountries\Countries;

class CountriesTest extends AbstractTestCase
{
    public function testThatCountriesCanBeLoadedFromAJsonFile()
    {
        $this->assertInstanceOf(Countries::class, $this->countries);
        $this->assertCount(249, $this->countries);
    }

    public function testThatACountryCanBeRetrievedByItsTwoLetterCode()
    {
        $gb = $this->countries->get('GB');

        $this->assertInstanceOf(Country::class, $gb);
        $this->assertEquals($gb->id(), 826);
        $this->assertEquals($gb->code(), '826');
        $this->assertEquals($gb->name(), 'United Kingdom');
        $this->assertEquals($gb->iso3116a2(), 'GB');
        $this->assertEquals($gb->iso3116a3(), 'GBR');
    }

    public function testThatACountryCodeIsPaddedToTheCorrectLength()
    {
        $af = $this->countries->get('AF');

        $this->assertInstanceOf(Country::class, $af);
        $this->assertEquals($af->id(), 4);
        $this->assertEquals($af->code(), '004');
    }
}
