<?php

declare(strict_types=1);

namespace LaraPKG\IsoCountries;

use Countable;
use Illuminate\Support\Collection;
use Illuminate\Support\Traits\ForwardsCalls;
use JsonException;

/**
 * @mixin Collection
 */
class Countries implements Countable
{
    use ForwardsCalls;

    /**
     * The list of countries keyed by their code.
     *
     * @var Collection
     */
    protected Collection $data;

    /**
     * @throws JsonException
     */
    public function __construct()
    {
        $this->data = $this->loadFromFile();
    }

    /**
     * Returns the number of registered countries.
     *
     * @return int
     */
    public function count(): int
    {
        return $this->data->count();
    }

    /**
     * Forwards calls to the inner collection instance.
     *
     * @param string $name
     * @param array $arguments
     *
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        return $this->forwardCallTo($this->data, $name, $arguments);
    }

    /**
     * Loads the country list from a JSON file.
     *
     * @return Collection
     * @throws JsonException
     */
    protected function loadFromFile(): Collection
    {
        $contents = json_decode(
            file_get_contents(__DIR__ . '/../data/countries.json'),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        return Collection::make($contents)
            ->map(static fn (array $country) => Country::make($country))
            ->keyBy(static fn (Country $country) => $country->iso3116a2());
    }
}
