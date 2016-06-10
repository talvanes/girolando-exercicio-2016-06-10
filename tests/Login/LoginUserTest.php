<?php namespace Login\Login;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Login\User;
use TestCase;

class LoginUserTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogin()
    {
        try {
            $user = User::create([
                'name' => "Talvanes",
                'email' => 'talba@email.com',
                'password' => bcrypt(str_random(10)),
                'remember_token' => str_random(10),
            ]);

            #echo print_r($userData);

            $response = $this
                ->actingAs($user)
                ->post(url('/login'))
                ->assertResponseOk();

            echo print_r($response->response->getContent());

        } catch(\Exception $e) {
            $this->assertTrue(false, "Exception: {$e->getMessage()}, on file: {$e->getFile()}, line #{$e->getLine()}");
        }
    }

    public function testRegister()
    {
        try {
            $userData = [
                'name' => "Talvanes",
                'email' => 'talba@email.com',
                'password' => bcrypt(str_random(10)),
                'remember_token' => str_random(10),
            ];

            $this
                ->post(url('/register'), $userData)
                ->assertRedirectedTo(route('dashboard.index'));

        } catch (\Exception $e) {
            $this->assertTrue(false, "Exception: {$e->getMessage()}, on file: {$e->getFile()}, line #{$e->getLine()}");
        }
    }
}
