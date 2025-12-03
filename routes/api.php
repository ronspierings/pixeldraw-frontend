<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PixelController;
use App\Models\PixelModel;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


/*
 Example 
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

*/


/*
    Custom PixelDraw routes for the API
*/

// Get all Pixels
Route::get('/pixels', [PixelController::class, 'index'] );

// Update (via PUT) a existing Pixel
Route::put('/pixels/pixelChange', [PixelController::class, 'pixelChange'] );
