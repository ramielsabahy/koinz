<?php

namespace Tests\Unit;

use App\Models\Book;
use App\Models\User;
use App\Models\UserBookInterval;
use App\Services\IncrementIntervalService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IncrementIntervalTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    use RefreshDatabase;

    /** @test */
    public function it_increments_total_read_pages_correctly()
    {
        // Create a book
        $book = Book::factory(1)->create()->first();
        $user = User::factory(1)->create()->first();
        // Create an interval for the book
        UserBookInterval::create([
            'book_id' => $book->id,
            'user_id' => $user->id,
            'start_page' => 5,
            'end_page' => 10,
        ]);

        // Create the service instance
        $service = new IncrementIntervalService();

        // Interval to be incremented
        $interval = [
            'start_page' => 8,
            'end_page' => 15,
        ];

        // Call the increment method
        $service->increment($book, $interval);

        // Reload the book from the database
        $book->refresh();

        // Assert that total_read_pages is incremented correctly
        $this->assertEquals(5, $book->total_read_pages);
    }
}
