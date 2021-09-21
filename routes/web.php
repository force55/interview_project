<?php

    use App\Http\Controllers\PostsController;
    use Illuminate\Support\Facades\Route;

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

    Route::get('/', function () {
        return view('welcome');
    });


    /* Route Post*/
    Route::get('/posts', [PostsController::class, 'index'])->name('posts');
//    Route::get('/posts/id/{id}', [PostsController::class, 'get'])->name('get_post');
    Route::post('/posts/store', [PostsController::class, 'store'])->name('create_post');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('create_view_post');
    Route::delete('/post/id/{id}', [PostsController::class, 'destroy'])->name('delete_post');
    /* End of Routes Post */
