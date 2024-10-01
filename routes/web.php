<?php

use App\Http\Controllers\EmailingController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get("/", [EmailingController::class, "index"]);
Route::get("/update", [EmailingController::class, "show"]);
Route::get('/emailing/filter', [EmailingController::class, 'filter'])->name('emails.filter');
Route::patch('/emails/{email}/read', [EmailingController::class, 'markAsRead'])->name('emails.read'); 
Route::post("/emailing/store", [EmailingController::class, "store"]);
Route::delete("/emailing/delete/{email}", [EmailingController::class, "destroy"])->name("emails.destroy");



Route::get("/image", [ImageController::class, "index"]);
Route::post("/image/store", [ImageController::class, "store"]);
Route::delete('/image/destroy/{id}', [ImageController::class, 'destroy']);

