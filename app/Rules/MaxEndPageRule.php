<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class MaxEndPageRule implements ValidationRule, DataAwareRule
{
    public $data;
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $maxPage = DB::table('books')->max('end_page');
    }

    public function setData(array $data)
    {
        // TODO: Implement setData() method.
    }
}
