<?php

use AntonioPrimera\AnafDataStructures\Cif;

it('can split a cif into country code and number', function () {
    $cif = Cif::from('RO46801317');

    expect($cif->withoutCountryCode())->toBe('46801317')
        ->and($cif->countryCode())->toBe('RO')
        ->and($cif->hasCountryCode())->toBeTrue()
        ->and($cif->isValid())->toBeTrue()
        ->and($cif->is('RO46801317'))->toBeTrue()
        ->and($cif->isNot('RO46801317'))->toBeFalse()
        ->and($cif->is('RO46801318'))->toBeFalse()
        ->and($cif->isNot('RO46801318'))->toBeTrue()
        ->and($cif->is('46801317'))->toBeFalse();       //even though the number is the same, the cif should always include the country code

    $cif = Cif::from('42009129');

    expect($cif->withoutCountryCode())->toBe('42009129')
        ->and($cif->countryCode())->toBeNull()
        ->and($cif->hasCountryCode())->toBeFalse();

    $cif = Cif::from('CHE-123.456.789 MWST');
    expect($cif->hasCountryCode())->toBeTrue()
        ->and($cif->countryCode())->toBe('CH')
        ->and($cif->withoutCountryCode())->toBe('E-123.456.789MWST');
});
