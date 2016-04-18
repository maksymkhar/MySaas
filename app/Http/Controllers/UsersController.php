<?php

namespace App\Http\Controllers;

use App\Events\UserHasChanged;
use App\HtmlProfileCreator;
use App\JsonProfileCreator;
use App\Listeners\UserCacheForget;
use App\Profile;
use Auth;
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
        //Event::fire('user.change');
        $this->fireUserHasChanged();
    }

    public function update($id)
    {
        $user = User::first();
        $user->name = "New User Name";
        $user->save();

        //Cache::flush();
        //Cache::forget('users');
        $this->fireUserHasChanged();
    }

    public function delete($id)
    {
        User::destroy($id);

        //Cache::flush();
        //Cache::forget('users');
        $this->fireUserHasChanged();
    }

    private function fireUserHasChanged()
    {
        Event::fire(new UserHasChanged(User::first()));
    }

    public function show(Profile $profile)
    {
        $user = Auth::user();

        return $profile->show($user);
    }

//    public function showHtmlProfile()
//    {
//        $user = Auth::user();
//        $profileCreator = new HtmlProfileCreator();
//
//        return $user->profile($profileCreator);
//    }
//
//    public function showJsonProfile()
//    {
//        $user = Auth::user();
//        $profileCreator = new JsonProfileCreator();
//
//        return $user->profile($profileCreator);
//    }
}
