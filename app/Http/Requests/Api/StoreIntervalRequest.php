<?php

namespace App\Http\Requests\Api;

use App\Models\Book;
use App\Rules\BookExists;
use App\Rules\MaxEndPageRule;
use App\Rules\ValidPageRange;
use Illuminate\Foundation\Http\FormRequest;

class StoreIntervalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'book_id'   => ['required', new BookExists()],
            'start_page'=> ['required', 'integer', new ValidPageRange()],
            'end_page'  => ['required', 'integer', 'gte:start_page', new ValidPageRange()]
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'book'  => Book::query()->where('id', $this->book_id)->first()
        ]);
    }
}
