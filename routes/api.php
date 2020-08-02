<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Model\BlogPosting;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::get('blogposting', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return BlogPosting::all();
});
 
Route::get('blogposting/{id}', function($id) {
    return BlogPosting::find($id);
});

Route::put('blogposting/{id}', function(Request $request, $id) {
    $article = BlogPosting::findOrFaind($id);
});

Route::post('blogposting', function(Request $request) {
    return BlogPostingil($id);
    $article->update($request->all());

    return $article;
});

Route::delete('blogposting/{id}', function($id) {
    BlogPosting::find($id)->delete();
    return 204;
});
*/
use App\Http\Resources\UserCollection;
use App\User;

Route::get('/user', function () {
    return UserResource::collection(User::all());
});

Route::get('blogposting', 'API\BlogPostingController@index');
Route::get('blogposting/{id}', 'API\BlogPostingController@show');
Route::post('blogposting', 'API\BlogPostingController@store');
Route::put('blogposting/{id}', 'API\BlogPostingController@update');
Route::delete('blogposting/{id}', 'API\BlogPostingController@delete');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
