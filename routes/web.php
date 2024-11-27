<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ProductController::class,'index']);

Route::resource('products', ProductController::class);
Route::resource('agents', AgentController::class);


Route::get('/child-agents/{id}',[AgentController::class,'child_Agent']);

Route::post('/assing-agent',[ProductController::class,'assign_agent']);