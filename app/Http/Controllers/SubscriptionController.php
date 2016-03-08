<?php

namespace App\Http\Controllers;

use App\User;
use Request;

use App\Http\Requests;

class SubscriptionController extends Controller
{
    public function subscribe()
    {
        $creditCardToken = Request::get('stripeToken');

        $user = User::find(1);
        $user->newSubscription('Plan 1', 'plan_1')->create($creditCardToken);
    }
}
