<?php
namespace AntonioPrimera\AnafDataStructures;

use Stringable;

/**
 * Handle romanian Vat Identification Numbers (optionally starting with RO)
 */
readonly class Cif implements Stringable
{
    public string $cif;

    //--- Construction & Factories ------------------------------------------------------------------------------------

    public function __construct(string $cif)
    {
        //remove all spaces and convert to uppercase
        $this->cif = $this->cleanCif($cif);
    }

    public static function from(string|Cif $cif): Cif
    {
        return $cif instanceof Cif ? $cif : new static($cif);
    }

    //--- Public API --------------------------------------------------------------------------------------------------

    /**
     * Check if the cif has a country code. If a specific country code is provided, check
     * for that specific country code, otherwise check if any country code is present.
     */
    public function hasCountryCode(string|null $countryCode = null): bool
    {
        return $countryCode
            ? str_starts_with($this->cif, strtoupper($countryCode))
            : preg_match('/^[A-Z]{2}/', $this->cif) === 1;
    }

    function withoutCountryCode(): string
    {
        // Remove spaces and extract the numeric part
        return preg_replace('/^[A-Z]{2}/', '', $this->cif);
    }

    function countryCode(): ?string
    {
        // Extract the country code if present
        return preg_match('/^([A-Z]{2})/', $this->cif, $matches)
            ? $matches[1]
            : null;
    }

    public function is(Cif|string $cif): bool
    {
        return is_string($cif)
            ? $this->cif === $this->cleanCif($cif)
            : $this->cif === $cif->cif;
    }

    public function isNot(Cif|string $cif): bool
    {
        return !$this->is($cif);
    }

    //--- Validation --------------------------------------------------------------------------------------------------

    /**
     * This only checks if the CIF is a valid romanian VAT number
     */
    public function isValid(): bool
    {
        $cleanCif = $this->withoutCountryCode();

        // Must have between 2 and 10 digits
        if (!preg_match('/^[0-9]{2,10}$/', $cleanCif))
            return false;

        // Control number
        $v = 753217532;
        //$controlDigit = 2;
        //$controlNumber = 75321753;
        $numericCif = intval($this->withoutCountryCode());

        // Extract the last digit (control digit)
        $cifControlDigit = $numericCif % 10;
        $numericCif = (int) ($numericCif / 10);

        // Multiply each digit with the corresponding digit from the control number (starting from the end)
        $t = 0;
        while($numericCif > 0){
            $t += ($numericCif % 10) * ($v % 10);
            $numericCif = (int) ($numericCif / 10);
            $v = (int) ($v / 10);
        }

        // Multiply the sum with 10 and extract the last digit [0 - 10]
        $controlDigit = $t * 10 % 11;

        // If the control digit is 10, make it 0
        if($controlDigit === 10)
            $controlDigit = 0;

        return $cifControlDigit === $controlDigit;
    }

    //--- Interface implementation ------------------------------------------------------------------------------------

    public function __toString()
    {
        return $this->cif;
    }

    //--- Protected helpers -------------------------------------------------------------------------------------------

    protected function cleanCif(string $cif): string
    {
        return strtoupper(str_replace(' ', '', $cif));
    }
}
