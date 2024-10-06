<?php
use AntonioPrimera\AnafDataStructures\Cif;

if (!function_exists('cif')) {
    function cif(string|Cif|null $cif): Cif|null
    {
        return is_string($cif) ? new Cif($cif) : $cif;
    }
}
