<?php

declare(strict_types=1);

namespace LaraPKG\IsoCountries;

interface CountryInterface
{
    /**
     * The country name.
     *
     * @return string
     */
    public function name(): string;

    /**
     * The two letter ISO-3116-1 Alpha-2 code.
     *
     * @return string
     */
    public function iso3116a2(): string;

    /**
     * The three letter ISO 3116-1 Alpha 3 code.
     *
     * @return string
     */
    public function iso3116a3(): string;

    /**
     * A proxy for the ISO-3116-1 Alpha-2 code.
     *
     * @return string
     */
    public function alpha2(): string;

    /**
     * A proxy for the ISO-3116-1 Alpha-3 code.
     *
     * @return string
     */
    public function alpha3(): string;

    /**
     * The countries ISO-3116-1 Numeric Code as an integer.
     *
     * @return int
     */
    public function id(): int;

    /**
     * The countries ISO-3116-1 Numeric Code (always 3 digits).
     *
     * @return string
     */
    public function code(): string;
}
