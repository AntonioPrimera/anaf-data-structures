<?php
namespace AntonioPrimera\AnafDataStructures\Components;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class CompanyVatData extends Data
{
    public function __construct(
        public bool $platitor,
        #[WithCast(DateTimeInterfaceCast::class)]
        public Carbon|null $dataInregistrare,
        #[WithCast(DateTimeInterfaceCast::class)]
        public Carbon|null $dataRadiere,
        public string|null $iban,
    ) {}
}
