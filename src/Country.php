<?php

declare(strict_types=1);

namespace LaraPKG\IsoCountries;

use Illuminate\Contracts\Support\Arrayable;

class Country implements CountryInterface, Arrayable
{
    /**
     * The country data.
     *
     * @var array
     */
    protected array $data;

    /**
     * @param array $data
     */
    protected function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Creates a new country with the given data array from JSON.
     *
     * @param array $data
     *
     * @return static
     */
    public static function make(array $data): static
    {
        return new static($data);
    }

    /**
     * The country name.
     *
     * @return string
     */
    public function name(): string
    {
        return $this->data['name'];
    }

    /**
     * The two letter ISO-3116-1 Alpha-2 code.
     *
     * @return string
     */
    public function iso3116a2(): string
    {
        return $this->data['iso3116-1']['a2'];
    }

    /**
     * The three letter ISO 3116-1 Alpha 3 code.
     *
     * @return string
     */
    public function iso3116a3(): string
    {
        return $this->data['iso3116-1']['a3'];
    }

    /**
     * A proxy for the ISO-3116-1 Alpha-2 code.
     *
     * @return string
     */
    public function alpha2(): string
    {
        return $this->iso3116a2();
    }

    /**
     * A proxy for the ISO-3116-1 Alpha-3 code.
     *
     * @return string
     */
    public function alpha3(): string
    {
        return $this->iso3116a3();
    }

    /**
     * The countries ISO-3116-1 Numeric Code as an integer.
     *
     * @return int
     */
    public function id(): int
    {
        return (int) $this->data['iso3116-1']['id'];
    }

    /**
     * The countries ISO-3116-1 Numeric Code (always 3 digits).
     *
     * @return string
     */
    public function code(): string
    {
        return str_pad((string) $this->id(), 3, '0', STR_PAD_LEFT);
    }

    /**
     * Transforms the country into an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id(),
            'name' => $this->name(),
            'code' => $this->code(),
            'iso3116-1-a2' => $this->alpha2(),
            'iso3116-1-a3' => $this->alpha3(),
        ];
    }
}
