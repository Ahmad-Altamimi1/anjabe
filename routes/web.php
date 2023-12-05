<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\postcontrol;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\SearchController;
use App\Models\Post;

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
Route::get('الصفحة_الرئيسية', [HomeController::class, "index"])->name("home");
Route::get('TV', [HomeController::class, "tv_show"])->name("tv_show");
Route::get('/showtag/{tag}', [postcontrol::class, "showtag"])->name("showtag");

Route::get('/المقال/{id}', [postcontrol::class,"show"])->name('ShoWarticle');
Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/search', [SearchController::class, 'index']);
Route::post('/search', [SearchController::class, 'search'])->name('search');


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

// Route::get('/', function () {
//     return view('welcome');
// });


/// dashboards
// Route::get('/login', [App\Http\Controllers\webcontrol::class, 'login'])->name('login');
// Route::get('/register', [App\Http\Controllers\webcontrol::class, 'register'])->name('register');
Route::get('/dashboard', [App\Http\Controllers\webcontrol::class, 'index'])->name('dashboard');
Route::get('/color', [App\Http\Controllers\postcontrol::class, 'color'])->name('color');
Route::get('/posts/create', [App\Http\Controllers\postcontrol::class, 'create'])->name('create');
Route::get('/posts/tags', [App\Http\Controllers\postcontrol::class, 'tags'])->name('tags');
Route::get('/posts', [App\Http\Controllers\postcontrol::class, 'posts'])->name('posts');
Route::get('/posts/addtags', [App\Http\Controllers\postcontrol::class, 'addtags'])->name('addtags');
Route::get('/posts/tags/{id}/edit', [App\Http\Controllers\postcontrol::class, 'tagsedit'])->name('tags.edit');
Route::get('/posts/{id}/edit', [App\Http\Controllers\postcontrol::class, 'postedit'])->name('post.edit');
Route::get('/profile/{user}/edit', [App\Http\Controllers\webcontrol::class, 'edit'])->name('profile.edit');
Route::get('/videos', [App\Http\Controllers\postcontrol::class, 'videos'])->name('videos');
Route::get('/videos/create', [App\Http\Controllers\postcontrol::class, 'createvideos'])->name('createvideos');
Route::get('/videos/{id}/edit', [App\Http\Controllers\postcontrol::class, 'videoedit'])->name('video.edit');
Route::get('/programs', [App\Http\Controllers\postcontrol::class, 'programs'])->name('programs');
Route::get('/programs/create', [App\Http\Controllers\postcontrol::class, 'createprograms'])->name('createprograms');
Route::get('/programs/{id}/edit', [App\Http\Controllers\postcontrol::class, 'programsvideos'])->name('programsvideos.edit');
Route::get('/programsvid/{id}/create', [App\Http\Controllers\postcontrol::class, 'createprogramsvid'])->name('createprogramsvid');
Route::get('/programsvid/{id}/edit', [App\Http\Controllers\postcontrol::class, 'editprogramsvid'])->name('editprogramsvid');
Route::get('/programseditprogram/{id}', [App\Http\Controllers\postcontrol::class, 'editprogramdata'])->name('editprogramdata.edit');

Route::get('/posts/groups', [App\Http\Controllers\postcontrol::class, 'groups'])->name('groups');
Route::get('/posts/addgroups', [App\Http\Controllers\postcontrol::class, 'addgroups'])->name('addgroups');
Route::get('/posts/groups/{id}/edit', [App\Http\Controllers\postcontrol::class, 'groupsedit'])->name('groups.edit');

Route::get('/posts/pictures', [App\Http\Controllers\postcontrol::class, 'pictures'])->name('pictures');
Route::get('/posts/addpictures', [App\Http\Controllers\postcontrol::class, 'addpicture'])->name('addpicture');
Route::get('/posts/pictures/{id}/edit', [App\Http\Controllers\postcontrol::class, 'picturesedit'])->name('pictures.edit');

///forms
Route::post('/storeposts', [App\Http\Controllers\postcontrol::class, 'storeposts'])->name('storeposts');
Route::post('/storetags', [App\Http\Controllers\postcontrol::class, 'storetags'])->name('storetags');
Route::patch('/tags/{tag}', [App\Http\Controllers\postcontrol::class, 'edittags'])->name('tags.update');
Route::patch('/posts/{id}', [App\Http\Controllers\postcontrol::class, 'editposts'])->name('post.update');
Route::patch('/posts/delete/{id}', [App\Http\Controllers\postcontrol::class, 'destroy'])->name('post.destroy');
Route::post('/storevideos', [App\Http\Controllers\postcontrol::class, 'storevideos'])->name('storevideos');
Route::patch('/videos/delete/{id}', [App\Http\Controllers\postcontrol::class, 'destroyvid'])->name('video.destroy');
Route::patch('/videos/{id}', [App\Http\Controllers\postcontrol::class, 'editvideos'])->name('video.update');
Route::post('/storeprograms', [App\Http\Controllers\postcontrol::class, 'storeprograms'])->name('storeprograms');
Route::patch('/programs/delete/{id}', [App\Http\Controllers\postcontrol::class, 'destroyprogram'])->name('program.destroy');
Route::post('/storeprogramsvid', [App\Http\Controllers\postcontrol::class, 'storeprogramsvid'])->name('storeprogramsvid');
Route::patch('/programsvid/{id}', [App\Http\Controllers\postcontrol::class, 'editprogramsvideo'])->name('programsvideo.update');
Route::patch('/programsvid/delete/{id}', [App\Http\Controllers\postcontrol::class, 'destroyprogramsvid'])->name('programsvid.destroy');
Route::patch('/program/{id}', [App\Http\Controllers\postcontrol::class, 'editprograms'])->name('program.update');

Route::post('/storegroups', [App\Http\Controllers\postcontrol::class, 'storegroups'])->name('storegroups');
Route::patch('/groups/delete/{id}', [App\Http\Controllers\postcontrol::class, 'destroygroups'])->name('destroygroups');
Route::patch('/groups/{group}', [App\Http\Controllers\postcontrol::class, 'editgroups'])->name('groups.update');

Route::post('/store_pictures', [App\Http\Controllers\postcontrol::class, 'store_pictures'])->name('store_pictures');
Route::patch('/pictures/delete/{id}', [App\Http\Controllers\postcontrol::class, 'destroypictures'])->name('destroypictures');
Route::patch('/pictures/{id}', [App\Http\Controllers\postcontrol::class, 'editpicture'])->name('picture.update');
Route::post('/updatePassword', [App\Http\Controllers\postcontrol::class, 'updatePassword'])->name('updatePassword');
Route::get('sitemap.xml', [App\Http\Controllers\webcontrol::class,  'sitemap'])->name('sitemap');
Route::get('/search-posts', [App\Http\Controllers\postcontrol::class, 'search'])->name('search-posts');
Route::get('/search-pictures', [App\Http\Controllers\postcontrol::class, 'search-pictures'])->name('search-pictures');
// add user control
Route::get('/userscontrol', [App\Http\Controllers\webcontrol::class, 'userscontrol'])->name('userscontrol');
Route::get('/showdayaction', [App\Http\Controllers\webcontrol::class, 'showdayaction'])->name('showdayaction');
Route::post('/showdaysaction', [App\Http\Controllers\webcontrol::class, 'showdaysaction'])->name('showdaysaction');
Route::patch('/tags/delete/{id}', [App\Http\Controllers\postcontrol::class, 'destroytags'])->name('destroytags');

// start user side route 
// Start Slider in Admin DashBored|
Route::get('/sliders', [SlidersController::class, 'show'])->name('showSlider');
Route::get('/slider/create', [SlidersController::class, 'create'])->name('slider.create');
Route::post('/storeslider', [SlidersController::class, 'storeslider'])->name('storeslider');
Route::get('/slider/{id}/edit', [SlidersController::class, 'slideredit'])->name('slider.edit');
Route::patch('/slider/{id}', [SlidersController::class, 'sliderupdate'])->name('slider.update');
Route::patch('/slider/delete/{id}', [SlidersController::class, 'destroy'])->name('slider.destroy');
// End Slider in Admin DashBored|
require __DIR__.'/auth.php';
