<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_login_page(): void{
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('Authentication.login');
    }

    public function test_login_with_valid_credentials(): void{
        User::factory()->create([
            'email' => 'email@test.test',
            'password' => Hash::make('pasword1234')
        ]);
        $response = $this->post('/login',[
            'email' => 'email@test.test',
            'password' => 'pasword1234'
        ]);

        $response->assertStatus(200);
    }

    public function test_logout(): void{
        $user = User::factory()->create([
            'email' => 'testuser@example.com',
            'password' => bcrypt('password1234'),
        ]);


        $response = $this->actingAs($user)
                            ->delete('/logout');
        $response->assertRedirect(route('loginPage'));

        $response->assertSessionHas('success', 'Deconnexion !');
        $this->assertFalse(Auth::check());
        $response->assertStatus(302);
    }

    public function test_get_register_page(): void{
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertViewIs('Authentication.register');
    }

    public function test_register_user(): void{
        $data = [
            'name' => 'test',
            'email' => 'email@email.test',
            'password' => 'testpasword',
            'password_confirmation' => 'testpasword'
        ];
        
        $response = $this->post('/register', $data);
        
        $response->assertValid();
        
        $response->assertStatus(200);
        
        $this->assertDatabaseHas('users', [
            'email' => 'email@email.test'
        ]);
        
        $this->assertTrue(Auth::check());
        $this->assertEquals('email@email.test', Auth::user()->email);
        
        $response->assertViewIs('Tasks.index');
    }

}
