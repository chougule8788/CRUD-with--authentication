<?php

use App\Http\Controllers\RelationController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//create route for fetch data 
Route::get('/get-data',[StudentController::class,'getData']);

//render data from controller
Route::get('/get-data/blade',[StudentController::class,'index']);


//one to one mapping
Route::get('one-one',[RelationController::class,'oneToOne']);

//one to many
Route::get('one-many',[RelationController::class,'OneToMany']);

//many to one
Route::get('many-one',[RelationController::class,'ManyToOne']);
