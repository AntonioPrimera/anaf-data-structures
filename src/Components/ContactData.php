<?php
namespace AntonioPrimera\AnafDataStructures\Components;

use Spatie\LaravelData\Data;

class ContactData extends Data
{
    public function __construct(
        public string|null $name,
        public string|null $phone,
        public string|null $email,
    ) {}
}
