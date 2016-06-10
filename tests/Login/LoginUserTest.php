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
     * Teste de login
     *
     * @return void
     */
    public function testLogin()
    {
        try {
            $user = User::create([
                'name' => "Talvanes",
                'email' => 'talba@email.com',
                'password' => bcrypt('123456'),
                'remember_token' => '123456',
            ]);
            /*$user = new User([
                'name' => "Talvanes",
                'email' => 'talba@email.com',
                'password' => bcrypt('123456'),
                'remember_token' => '123456',
            ]);*/

            $response = $this
                ->visit(url('/login'))
                ->type($user->email, 'email')
                ->type($user->remember_token, 'password')
                ->press('Login')
                ->followRedirects()
                ->assertResponseOk();
                /*->seeCredentials([
                    'email' => $user->email,
                    'password' => $user->password,
                ])*/
                #->type($user->email, 'email')
                #->type($user->password, 'password')
                #->check('remember')
                #->seePageIs(route('dashboard.index'));
                #->assertResponseOk();
                #->assertRedirectedTo(route('dashboard.index'));

            echo print_r($response->response->getStatusCode());

        } catch(\Exception $e) {
            $this->assertTrue(false, "Exception: {$e->getMessage()}, on file: {$e->getFile()}, line #{$e->getLine()}");
        }
    }

    /**
     * Teste de cadastro de usuário.
     *
     * @return void
     */
    public function testRegister()
    {
        try {
            $user = factory(User::class)->create();

            $this
                ->post(url('/register'), $user->getAttributes())
                ->followRedirects()
                ->assertResponseOk();

            #echo print_r($response->response->getContent());

        } catch (\Exception $e) {
            $this->assertTrue(false, "Exception: {$e->getMessage()}, on file: {$e->getFile()}, line #{$e->getLine()}");
        }
    }
}
