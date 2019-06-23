<?php
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

/**
 * Account
 */
Route::group(['prefix' => 'account', 'middleware' => ['auth']], function(){
    Route::get('/', 'Account\AccountController@index')->name('account.index');

    /**
     * Profile
     */
    Route::get('profile', 'Account\ProfileController@index')->name('account.profile.index');
    Route::post('profile', 'Account\ProfileController@store')->middleware(['verified'])->name('account.profile.store');

    /**
     * Password
     */
    Route::get('password', 'Account\PasswordController@index')->name('account.password.index');
    Route::post('password', 'Account\PasswordController@store')->middleware(['verified'])->name('account.password.store');

    /**
     * Manage the subscription
     */
    Route::group(['prefix' => 'subscription', 'namespace' => 'Account\Subscription'], function(){
        /**
         * Cancel subscription
         */
        Route::group(['middleware' => 'subscription.notcancelled'], function(){
            Route::get('/cancel', 'SubscriptionCancelController@index')->name('subscription.cancel.index');
            Route::post('/cancel', 'SubscriptionCancelController@store')->name('subscription.cancel.store');
        });

        /**
         * Resume subscription
         */
        Route::group(['middleware' => 'subscription.cancelled'], function(){
            Route::get('/resume', 'SubscriptionResumeController@index')->name('subscription.resume.index');
            Route::post('/resume', 'SubscriptionResumeController@store')->name('subscription.resume.store');
        });


        /**
         * Swap subscription
         */
        Route::group(['middleware' => 'subscription.notcancelled'], function(){
            Route::get('/swap', 'SubscriptionSwapController@index')->name('subscription.swap.index');
            Route::post('/swap', 'SubscriptionSwapController@store')->name('subscription.swap.store');
        });
        

        /**
         * Card
         */
        Route::group(['middleware' => 'subscription.customer'], function(){
            Route::get('/card', 'SubscriptionCardController@index')->name('subscription.card.index');
            Route::post('/card', 'SubscriptionCardController@store')->name('subscription.card.store');
        });
        

    });
});

/**
 * Plans
 */
Route::group(['prefix' => 'plans'], function(){
    Route::get('/', 'Subscription\PlanController@index')->name('plans.index');
    Route::get('/teams', 'Subscription\PlanTeamController@index')->name('plans.teams.index');
});

/**
 * Subscription
 */
Route::group(['prefix' => 'subscription', 'middleware' => ['auth.register']], function(){
    Route::get('/', 'Subscription\SubscriptionController@index')->name('subscription.index');
    Route::post('/', 'Subscription\SubscriptionController@store')->name('subscription.store');
});

/**
 * Admin
 */
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'admin'], function(){
    Route::get('/', function(){return view('admin.index');})->name('admin.index');
    
    /** Impersonate routes **/
    Route::get('impersonate', 'ImpersonateController@index')->name('admin.impersonate');
    Route::post('start', 'ImpersonateController@store')->name('admin.impersonate.store');

    /** Posts routes **/
    Route::get('posts', 'PostController@index')->name('admin.posts.index');
    Route::post('posts', 'PostController@store')->name('admin.posts.store');
    Route::get('post/{post}', 'PostController@show')->name('admin.posts.show');
    Route::get('post/{post}', 'PostController@edit')->name('admin.posts.edit');
    Route::patch('post', 'PostController@update')->name('admin.posts.update');
    Route::get('post/{post}', 'PostController@destroy')->name('admin.posts.destroy');

    /** Users **/
    Route::get('users', 'UsersController@index')->name('admin.users.index');
    Route::get('users/{user}', 'UsersController@show')->name('admin.users.show');

    /** Plans **/
    Route::get('plans', 'PlanController@index')->name('admin.plans.index');
    Route::get('plans/{plan}', 'PlanController@edit')->name('admin.plans.edit');
    Route::patch('plans/{plan}', 'PlanController@update')->name('admin.plans.update');
});
Route::delete('admin/impersonate', 'Admin\\ImpersonateController@destroy')->name('admin.impersonate.destroy');




/**
 * Moderator
 */
Route::get('moderator', function(){
    return view('moderator.index');
})->middleware(['moderator'])->name('moderator');


/**
 * Webhooks
 */
Route::post('/webhook/stripe', 'Webhooks\StripeWebhookController@handleWebhook');