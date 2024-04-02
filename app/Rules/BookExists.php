<?php

namespace App\Rules;

use App\Models\Book;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class BookExists implements ValidationRule, DataAwareRule
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
        if (!$book)
            $fail("Book doesn't exist");
    }

    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }
}
