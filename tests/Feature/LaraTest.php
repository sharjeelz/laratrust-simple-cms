<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LaraTest extends TestCase
{

    /**
     * Test Authentication
     *
     * @return void
     */

    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login'); //pass url which you going to hit
        $response->assertViewIs('auth.login'); //pass view file
    }
    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = factory(\App\User::class)->make();
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/home');

    }
    public function test_admin_can_login_with_correct_credentials()
    {
        $this->assertCredentials(['email'=>'admin@admin.com','password'=>'123456']);
    }

    public function test_admin_cannot_login_with_incorrect_credentials()
    {
        $this->assertInvalidCredentials(['email'=>'admin@admin.com','password'=>'12345']);
    }

    public function test_user_can_add_user()
    {

        $response = $this->get('/register');
        $response->assertViewIs('sysuser.create-user'); //pass view file
        $user = factory(\App\User::class)->create();
        $response=$this->followingRedirects()->post('user/create', $user->toArray());
        $response->assertStatus(200);
    }
    public function test_user_can_add_role()
    {
        $response = $this->get('/role/create');
        $response->assertViewIs('sysuser.create-role'); //pass view file


        $role = factory(\App\Role::class)->make();
        $r=$role->toArray();

        $response=$this->followingRedirects()->post('roles', $r);
        $response->assertStatus(200);
        $response = $this->get('/roles');
        $response->assertStatus(200);

    }
    public function test_user_can_add_persmission()
    {
        $response = $this->get('/permission/create');
        $response->assertViewIs('sysuser.create-permission'); //pass view file

        $permission = factory(\App\Permission::class)->make();
        $r=$permission->toArray();

        $response=$this->followingRedirects()->post('permission', $r);
        $response->assertStatus(200);
        $response = $this->get('/permissions');
        $response->assertStatus(200);
    }
}
