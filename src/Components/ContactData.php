<?php
namespace AntonioPrimera\AnafDataStructures\Components;

class ContactData
{
    public function __construct(
        public string|null $name,
        public string|null $phone,
        public string|null $email,
    ) {}
}
