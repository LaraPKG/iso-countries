# LaraPKG
## IsoCountries

A simple PHP mapper for [ISO](https://en.wikipedia.org/wiki/List_of_ISO_3166_country_codes) country data.

> Country data is available within the `data` folder: in CSV, JSON and ODS format for convenience.

### Usage

```php
// Create an instance directly:
$countries = new \LaraPKG\IsoCountries\Countries();

// Could also be bound to a container:
//$this->app->singleton(Countries::class);
//$this->app->alias(Countries::class, 'countries');
```

The country records are keyed by their two letter ISO-3116-1 Alpha-2 code.

```php
$gb = $countries->get('GB');
$us = $countries->get('US');
$fr = $countries->get('FR');
```

---

The countries class forwards calls to the collection instance so any Laravel
Collection methods can be used to retrieve a country record.

```
$countries
    ->filter(static fn (Country $country) => $country->alpha3() === 'AUS')
    ->first();
```

---

Countries can be retrieved as an array for processing elsewhere in your application:
```php
$countries->toArray();
```
