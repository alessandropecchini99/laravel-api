<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\TypeController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('posts', [PostController::class, 'index'])->name('api.posts.index'); // nomesito/api/posts
Route::get('posts/random', [PostController::class, 'random'])->name('api.posts.random');
Route::get('posts/{post}', [PostController::class, 'show'])->name('api.posts.show');

Route::get('types', [TypeController::class, 'index'])->name('api.types.show'); // nomesito/api/types

Route::post('leads/', [LeadController::class, 'store'])->name('api.leads.store');
