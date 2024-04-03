<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\LoginService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_user_when_credentials_are_correct()
    {
        // Create a user
        $password = 'password123';
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make($password),
        ]);

        // Create the service instance
        $service = new LoginService();

        // Credentials to be checked
        $credentials = [
            'email' => 'test@example.com',
            'password' => $password,
        ];

        // Call the execute method
        $result = $service->execute($credentials);

        // Assert that the result is the user instance
        $this->assertInstanceOf(User::class, $result);
        $this->assertEquals($user->id, $result->id);
    }

    /** @test */
    public function it_returns_null_when_credentials_are_incorrect()
    {
        // Create the service instance
        $service = new LoginService();

        // Invalid credentials
        $credentials = [
            'email' => 'nonexistent@example.com',
            'password' => 'incorrectPassword',
        ];

        // Call the execute method
        $result = $service->execute($credentials);

        // Assert that the result is null
        $this->assertNull($result);
    }
}
