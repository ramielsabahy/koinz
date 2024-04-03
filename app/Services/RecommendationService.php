<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class RecommendationService
{
    public function recommend(): Collection
    {
        return Book::query()->orderBy('total_read_pages', 'DESC')->limit(5)->get();
    }
}
