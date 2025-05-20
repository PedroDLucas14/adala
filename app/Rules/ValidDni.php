<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidDni implements ValidationRule
{
    
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Check if the value is a valid DNI
        if (!preg_match('/^\d{8}[A-Z]$/', $value)) {
            $fail(':attribute no es un DNI valido.');
            return;
        }

        // Extract the number and letter from the DNI
        $number = substr($value, 0, 8);
        $letter = substr($value, 8, 1);

        // Calculate the expected letter
        $expectedLetter = strtoupper(substr('TRWAGMYFPDXBNJZSQVHLCKE', $number % 23, 1));

        // Check if the letter matches the expected letter
        if ($letter !== $expectedLetter) {
            $fail(':attribute no es un DNI valido.');
        }                
    }
}
