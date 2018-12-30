<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {

        return view ('sysuser.create-user')->with(['roles'=>\App\Role::all(),'permissions'=>\App\Permission::all()]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $guest= \App\Role::where('name', '=', 'guest')->first();

        if (empty($guest)) {
            $guest= new \App\Role();
            $guest->name="guest";
            $guest->display_name="Guest";
            $guest->description="Default Role for new user";
            $guest->type=0;
            $guest->save();
   }
   if(!empty($request->get('roles'))){
        $user->syncRoles($request->get('roles'));
   }
        $user->attachRole($guest);

        if(!empty($request->get('permissions'))){
            $user->syncPermissions($request->get('permissions'));
       }

        //$this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
