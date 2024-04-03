<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $existingIntervals = \App\Models\UserBookInterval::where('book_id', 1)->get();
    $newPages = 70 - 1;
    foreach ($existingIntervals as $existingInterval) {
        // Adjust new pages by excluding overlap with existing intervals
        $newPages -= max(0, min($existingInterval->end_page, 70) - max($existingInterval->start_page, 1));
    }

    return $newPages;
});
