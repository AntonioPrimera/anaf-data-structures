<?php
namespace AntonioPrimera\AnafDataStructures\Components;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class AddressData extends Data
{
    public function __construct(
        public string|null $city,
        public string|null $county,
        public string|null $street,
        public string|null $streetNumber,
        public string|null $postalCode,
        public string|null $country,
        public string|null $details,
    ) {}

    public function fullAddress(): string
    {
        return "{$this->street}, {$this->streetNumber}, "
            . ($this->details ? "{$this->details}, " : '')
            . "{$this->city}, Judet:{$this->county}, CP:{$this->postalCode}, {$this->country}";
    }
}
