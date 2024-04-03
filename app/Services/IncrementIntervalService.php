<?php

namespace App\Services;

use App\Models\Book;
use App\Models\UserBookInterval;
use Illuminate\Support\Facades\Log;

class IncrementIntervalService
{
    public function increment(Book $book, array $interval)
    {
        for ($page = $interval['start_page']; $page < $interval['end_page']; $page++) {
            $existingInterval = UserBookInterval::where('book_id', $book->id)
                ->where(function ($query) use ($page) {
                    $query->where('start_page', '<=', $page)
                        ->where('end_page', '>', $page);
                })
                ->exists();
            if (!$existingInterval) {
                $book->increment('total_read_pages');
            }
        }
    }
}
