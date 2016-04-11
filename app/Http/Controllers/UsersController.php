<?php

namespace App\Http\Controllers;

use Cache;
use Event;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{


    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $value = Cache::remember('users', 10, function() {
            return User::all();
        });

        return $value;
    }

    public function store()
    {
        User::create([
            'name' => "Jolo Compolo",
            'email' => "jolo@compolo.com",
            'password' => bcrypt("password"),
            'remember_token' => str_random(10),
        ]);

        //Cache::flush();
        //Cache::forget('users');
        Event::fire('user.change');
    }

    public function update($id)
    {
        $user = User::first();
        $user->name = "New User Name";
        $user->save();

        //Cache::flush();
        //Cache::forget('users');
        Event::fire('user.change');
    }

    public function delete($id)
    {
        User::destroy($id);

        //Cache::flush();
        //Cache::forget('users');
        Event::fire('user.change');
    }
}
