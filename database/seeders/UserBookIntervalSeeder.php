<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\UserBookInterval;
use App\Services\IncrementIntervalService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class UserBookIntervalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(IncrementIntervalService $incrementIntervalService): void
    {
        $books = Book::all();
        $users = User::all();
        foreach ($books as $book){
            foreach ($users as $user){
                $startPage = rand(1, $book->pages - 10);
                $endPage = rand($startPage + 1, $book->pages);
                $incrementIntervalService->increment($book, [
                    "start_page"    => $startPage,
                    "end_page"      => $endPage
                ]);
                $interval = new UserBookInterval();
                $interval->user_id = $user->id;
                $interval->book_id = $book->id;
                $interval->start_page = $startPage;
                $interval->end_page = $endPage;
                $interval->save();
            }
        }
    }
}
