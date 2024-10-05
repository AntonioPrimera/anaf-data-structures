<?php
namespace AntonioPrimera\AnafDataStructures;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AnafDataStructuresServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('anaf-data-structures');
            //->hasMigration('create_anaf_data_structures_table')
            //->hasCommand(AnafDataStructuresCommand::class);
    }
}
