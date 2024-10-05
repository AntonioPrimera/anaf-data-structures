<?php
namespace AntonioPrimera\AnafDataStructures;

use AntonioPrimera\AnafDataStructures\Components\AddressData;
use AntonioPrimera\AnafDataStructures\Components\CompanyVatData;
use AntonioPrimera\AnafDataStructures\Components\ContactData;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class AnafCompanyData extends Data
{
    public function __construct(
        // Date generale
        public string $nume,
        public string $cif,
        public string $regCom,
        public string|null $adresaCompleta,

        // Date de radiere, inactivare, reactivare
        public Carbon|null $dataRadiere,
        public Carbon|null $dataInactivare,
        public Carbon|null $dataReactivare,

        // Adresa si contact
        public AddressData $adresa,
        public ContactData $contact,

        // Date TVA
        public CompanyVatData $tva,
        public CompanyVatData $tvaLaIncasare,
        public CompanyVatData $tvaSplit,
    ) {}
}
