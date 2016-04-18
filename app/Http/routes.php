<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Laravel\Cashier\Subscription;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    //Route::get('auth/{provider}', 'Auth\AuthController@redirectToAuthenticationServiceProvider');
    //Route::get('auth/{provider}/callback', 'Auth\AuthController@handleAuthenticationServiceProviderCallback');

    Route::get('csstransitions', function(){
        return view('tinkering.csstransitions');
    });

    Route::get('onesignal', function(){
        return view('layouts.onesignal');
    });
});


App::bind('Flash',
    App\Http\Flash::class);

// TODO: FER RUTA MENU
Route::get('users', 'UsersController@index');
Route::post('users', 'UsersController@store');
Route::delete('users/{id}', 'UsersController@delete');
Route::put('users/{id}', 'UsersController@update');

Route::group(['middleware' => 'web'], function () {





    Route::get('/', ['as' => 'welcome', 'uses' => 'WelcomeController@index']);
    Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider');
    Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');
    Route::get('plans', 'PlansController@index');
    Route::get('register_subscription',  function () {
        return View('auth.register_subscription');
    });
    //Route::post('subscription_payment', 'SubscriptionController@subscribe');
    Route::post('registerAndSubscribeToStripe', 'Auth\AuthController@registerAndSubscribeToStripe');
    Route::post('sendContactEmail', 'ContactEmailController@send');






//    Event::listen('user.change', function() {
//        Cache::forget('users');
//    });

    Route::get('profile', 'UsersController@show');



    Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider');
    Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

    Route::get('plans', 'PlansController@index');


    Route::get('register_subscription',  function () {
        return View('auth.register_subscription');
    });

    Route::post('subscription_payment', 'SubscriptionController@subscribe');

    Route::get('reports/daily_sales', 'ReportsController@dailySales');


    Route::get('download_invoice', 'PDFController@downloadInvoice');
    Route::get('invoice', 'PDFController@invoiceHtml');


    Route::get('invoice_generator', 'PDFController@invoiceGenerator');


    Route::get('test', function(){

        $subscriptions = Subscription::all();

        $totals = array();

        foreach ($subscriptions as $subscription) {

            $day = $subscription->created_at->format('Y-m-d');
            $quantity = $subscription->quantity;

            $daily = array($day => $quantity);

            if(!in_array($daily, $totals, true)){
                array_push($totals, $daily);
            }
        }

        //array_unique($totals);

        dd(json_encode($totals));

        //$result = array_unique($totals);

        //echo $result;

    });

});