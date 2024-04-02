<?php

namespace App\Services;

use App\Models\UserBookInterval;

class BookService
{
    public function store(array $data)
    {
        return UserBookInterval::updateOrCreate($data);
    }
}

