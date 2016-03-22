<?php

namespace App\Http\Controllers;

use App\User;
use Request;

use App\Http\Requests;

class SubscriptionController extends Controller
{
//    public function subscribe()
//    {
//        $creditCardToken = Request::get('stripeToken');
//
//        $user = User::find(2);
//        $user->newSubscription('Plan 1', 'plan_1')->create($creditCardToken);
//    }

    protected function subscribeToStripe($creditCardToken, User $user)
    {
        $user->newSubscription('Plan 1', 'plan_1')
            ->create($creditCardToken);
    }

    protected function registerAndSubscribeToStripe(Request $request)
    {
        $creditCardToken = $request->input('stripeToken');
        $user = null;
        $this->subscribeToStripe($creditCardToken,$user);
    }


}
