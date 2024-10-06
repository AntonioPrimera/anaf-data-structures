<?php
namespace AntonioPrimera\AnafDataStructures\Rules;

use AntonioPrimera\AnafDataStructures\Cif;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CifValidationRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!Cif::from($value)->isValid())
            $fail(__('validation.cif'));
    }
}
