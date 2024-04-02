<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidPageRange implements ValidationRule, DataAwareRule
{
    protected $data = [];
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $book = $this->data['book'];
        if ($value < 1 || $value > $book->pages)
            $fail("The :attribute must be within the range of pages for the specified book.");
    }

    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }
}
