<?php

namespace App\Http\Controllers;

use App\Events\ShotOutAdded;
use App\Events\ShoutOutAdded;
use App\ShoutOut;
use Event;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Pusher;
use Redirect;

class ShoutOutController extends Controller
{
    public function index()
    {
        return View('layouts.shoutout');
    }

    public function shoutOut(Request $request)
    {
        $shotOut = new ShoutOut();
        $shotOut->content = $request->get('content');
        $shotOut->user_id = Auth::user()->id;
        $shotOut->save();

        //$this->manualPusherEvent($shotOut);
        Event::fire(new ShoutOutAdded($shotOut));

        return View('layouts.shoutout');
    }

    public function manualPusherEvent($shotOut)
    {
        $pusher = new Pusher(
            '3b45f2461bd87c9abfff',
            '8845928a5adbb9a6dd91',
            '200974'
        );

        $pusher->trigger('shoutout-added', "App\\Events\\ShoutOutAdded", $shotOut);
    }
}
