<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('test', function () {
    event(new App\Events\NewNotification('Someone', 'message'));
    return "Event has been sent!";
});
Route::auth();

Route::group(['middleware'=>['web']],function(){

  //  Route::auth();
    // Route::get('auth/{provider}', 'AuthSocController@redirectToProvider');
    // Route::get('auth/{provider}/callback', 'AuthSocController@handleProviderCallback');
    Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
    Route::get('/callback/{provider}', 'SocialController@callback');
    Route::get('/', function () {
        return view('auth.login');

    });
});

// change language of site using url
Route::get('lang/{lang}', function($lang){
    session()->has('lang')? session()->forget('lang'): '';
    $lang == 'ar'? session()->put('lang', 'ar'): session()->put('lang', 'en');
    return back();
});


        //--------------------------------------------------------------------//
        //--------------------------ADMIN ROUTES------------------------------//
        //--------------------------------------------------------------------//


Route::group(['middleware'=>['admin']],function(){
    /* adminController */
    Route::get('/adminpanel','adminController@index');
    Route::get('/allAdmins','adminController@showAllAdmins');
    Route::get('/addAdmin','adminController@addAdmin');
    Route::post('/addAdmin','adminController@storeAdmin');
    Route::get('/admins/{id}/edit','adminController@editAdmin');
    Route::post('/admins/{id}','adminController@updateAdmin');
    Route::get('/admins/{id}/delete','adminController@destroyAdmin');
    //Route::resource('/admins','adminController');
    Route::get('/allRestaurants','adminController@showAllRestaurants');
    Route::get('addRestaurant','adminController@addRestaurant');
    Route::post('addRestaurant','adminController@storeRestaurant');
    Route::get('restaurants/{id}/edit','adminController@editRestaurant');
    Route::post('restaurants/{id}','adminController@updateRestaurant');
    Route::get('restaurants/{id}/delete','adminController@destroyRestaurant');

    Route::get('/allUsers','adminController@showAllUsers');
    Route::get('/reportedUsers','adminController@reportedUsers');
    /* adminController */

    /* restaurantController */
    Route::resource('restaurants','restaurantController');
    /*Route::get('/allRestaurants','restaurantController@showAllRestaurants');
    Route::get('/allRestaurants','adminController@showAllRestaurants');*/

    /* restaurantController */

    /**/
    Route::get('/adminProfile/{id}','adminController@showProfile');
    Route::post('/adminProfile/{id}','adminController@editProfile');
    Route::post('/uploadA/{id}','adminController@upload');
    Route::post('/editAPassword/{id}','adminController@editPassword');

    Route::post('/adminLogout', 'adminController@logout')->name('adminLogout');
    //Route::post('/logout', 'restaurantController@logout')->name('admin.logout');
    /**/


});
        //--------------------------------------------------------------------//
        //--------------------------USERS ROUTES------------------------------//
        //--------------------------------------------------------------------//


Route::group(['middleware'=>['web','user']],function(){

    Route::post('/userLogout', 'userController@logout')->name('userLogout');
    Route::get('/home','userController@index');
    Route::get('/friends','userController@showFriends');
    Route::get('/profile/{id}','userController@showProfile');
    Route::post('/profile/{id}','userController@editProfile');
    Route::post('/upload/{id}','userController@upload');
    Route::post('/editPassword/{id}','userController@editPassword');
    Route::get('/findPartner', 'userController@findPartner');
    


    Route::get('/invites','userController@showInvites');

    ///////..............users nearby...................... ////////////


    Route::get('/nearby','userController@partnerNearBy');


    ///////..............USER MESSAGES...................... ////////////

    //Route::get('messagesNotifications','messageController@getUserNotifications');
    // Route::get('messages','messageController@getMessages');
    // Route::post('message','messageController@getMessageById');
    // Route::post('messageSent','messageController@getMessageSent');
//    Route::post('sendMessage','messageController@sendMessage');
    Route::get('/load-latest-messages', 'MessagesController@getLoadLatestMessages');
 
    Route::post('/send', 'MessagesController@postSendMessage');
    Route::get('/fetch-old-messages', 'MessagesController@getOldMessages');

    ///////..............USER CONVERSATION...................... ////////////

    Route::get('conversation','conversationController@getUserConversationById');
    Route::post('/conversation/sendMessage','conversationController@sendMessage');
    Route::post('/conversation/isTyping','conversationController@isTyping');
    Route::post('/conversation/notTyping','conversationController@notTyping');
    Route::post('/conversation/retrieveConversationMessages','conversationController@retrieveConversationMessages');
    Route::post('/conversation/retrieveTypingStatus','conversationController@retrieveTypingStatus');
//    Route::get('Conversation','conversationController@getUserConversationById');
//    Route::get('Conversation','conversationController@getUserConversationById');



    ///////..............USER INVITATION...................... ////////////

    Route::post('invitation','invitationController@storeInvitation');
    Route::get('myInvitations','invitationController@getInvitations');

    Route::get('/approveInvitation','invitationController@approveInvitation');
    Route::get('/rejectInvitation','invitationController@rejectInvitation');

    ////////............User Notifications ................................//////////
    // Route::get('notifications','notificationController@getNotification');
    //Route::post('markAsRead/{id}','notificationController@markAsRead');
    Route::get('getNotificationNumber', 'notificationController@getNotificationNumber');
    Route::get('/markAsRead', function(){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('mark');



    ////////............User messages ................................//////////

    Route::get('messages','messageController@index');



});



            //----------------------------------------------------------------------//
            //-----------------------RESTAURANT ROUTES------------------------------//
            //---------------------------------------------------------------------//

Route::group(['middleware'=>['web','restaurant']],function(){

    Route::get('/restaurant','restaurantController@index');
    Route::get('/reservations','reservationController@getReservations');
    /**/
    //Route::get('/restaurant','restaurantController@index');
    Route::get('/restaurantProfile/{id}','restaurantController@showProfile')->name('restaurantProfile');
    Route::post('/restaurantProfile/{id}','restaurantController@editProfile');
    Route::post('/uploadR/{id}','restaurantController@upload');
    Route::post('/editRPassword/{id}','restaurantController@editPassword');
    /**/


    //***   routes for approve and reject the reservation  ***/

    Route::get('/approveReservation','reservationController@approveReservation');
    Route::get('/rejectReservation','reservationController@rejectReservation');
    Route::post('/logout', 'restaurantController@logout')->name('restaurant.logout');

});
    Route::get('/firebase','userController@addUserToFireBase');
