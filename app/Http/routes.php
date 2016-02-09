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

Route::get('job/getinbox', function () {
    dispatch(new App\Jobs\GetInbox('Test String Parameter'));
    return 'Done!';
});

Route::get('/', function () {
    return view('welcome');
});


//Social Login
//Route::get('/login/{provider?}',[
//    'uses' => 'AuthController@getSocialAuth',
//    'as'   => 'auth.getSocialAuth'
//]);
//
//
//Route::get('/login/callback/{provider?}',[
//    'uses' => 'AuthController@getSocialAuthCallback',
//    'as'   => 'auth.getSocialAuthCallback'
//]);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This Route group applies the "web" middleware group to every Route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['prefix' => 'api', 'middleware'=>['web']], function() {
   // Route::controller('search', 'SearchController');
    Route::controller('table', 'TableController');
   // Route::controller('data', 'DataController');
   // Route::controller('system', 'SystemController');
});

//// Start Online Page
Route::group(['middleware'=>['web', 'Admin']],function(){

    Route::get('main', 'MainController@index');

//    Route::get('main', 'MainController@index');
//    Route::get('testquery','MainController@testQuery');
//    Route::get('query','MainController@query');
});



Route::group(['prefix' => 'api', 'middleware'=>['web', 'Admin', 'Before', 'After']], function() {

    Route::post('fileupload', 'MainController@postfileupload');

    Route::resource('categorys', 'CategoryController');





    Route::get('facebook/bgConversations', 'FacebookController@bgConversations');
//    Route::get('facebook/inbox', 'FacebookController@inbox');

    Route::get('facebook/inbox', 'FacebookController@inbox');
    Route::get('facebook/conversation/{id}', 'FacebookController@conversation');
    Route::post('facebook/inboxmessage', 'FacebookController@inboxmessage');
    Route::post('facebook/inboxreply', 'FacebookController@inboxreply');


    Route::resource('facebooks', 'FacebookController');

    //Route::resource('auths','AuthController');


});
Route::group(['middleware' => ['web']], function () {

    // Custom Login
    Route::get('login', 'MainController@loginUser');
    Route::post('login/process', 'MainController@postProcess');
    Route::post('login/processfb', 'MainController@postProcessfb');
    Route::post('login/createpage', 'MainController@postCreatepage');
    Route::post('login/selectpage', 'MainController@postSelectpage');
    Route::post('login/pagelist', 'MainController@postPagelist');
    Route::get('logout', 'MainController@LogoutUser');

});
//
//
///* Utils */
//
//Route::get('genhn','MainController@genHN');
//Route::get('testcode','MainController@testcode');
//Route::get('gencode','MainController@genCode');
Route::get('seed', 'MainController@seed');
//Route::get('carbon','MainController@carbon');
//
///* Laravel 5 Default */
//
//Route::group(['middleware' => ['web']], function () {
//    //
//});
