<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test',function(){
    return ['name'=>'shreyash chougule','age'=>'24','email'=>'chouguleshreyash@8788'];
});


  





//create token password = 4e6ft8t
Route::post('signup',[UserAuthController::class,'signup']);
Route::post('login',[UserAuthController::class,'login']);


Route::group(['middleware'=>"auth:sanctum"],function(){
  //get all data from database
  Route::get('all',[StudentController::class,'getDataAPI']);
  //add data to the database
  Route::post('add',[StudentController::class,'addDataAPI']);
  //update data into database
  Route::put('update',[StudentController::class,'UpdateDataAPI']);    
  //delete data from database
  Route::delete('delete/{id}',[StudentController::class,'DeleteDataAPI']);
  //search data by name
  Route::get('get/{name}',[StudentController::class,'SearchDataAPI']);
});

