<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider, and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//show all std
Route::get('/allstudents',[ApiController::class,'index']);

//find specific std
Route::get('/allstudents/{id}', [ApiController::class,'find']);

//add new std
//Route::post('/student',[ApiController::class,'create']); 

//add new std
Route::post('/addnew',[ApiController::class,'store']);

//update std
Route::put('/updatestudents/{id}', [ApiController::class,'update']);

//delete std
Route::delete('/deletestudents/{id}',[ApiController::class,'destroy']);