<?php namespace Login\Login;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Login\User;
use TestCase;

class LoginUserTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogin()
    {
        try {
            $user = factory(User::class)->make();

            $this
                ->actingAs($user)
                ->get('/login')
                ->assertResponseOk();
        } catch(\Exception $e) {
            $this->assertTrue(false, "Exception: {$e->getMessage()}, on file: {$e->getFile()}, line #{$e->getLine()}");
        }
    }
}
