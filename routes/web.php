<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\NonProtectedRoute;
use App\Http\Middleware\ProtectedRoute;
use Illuminate\Support\Facades\Route;

Route::controller(UsersController::class)->prefix("auth")->group(function () {
    Route::get("/logout", "logout")->name("log-out")->middleware(ProtectedRoute::class);

    Route::middleware(NonProtectedRoute::class)->group(function () {
        Route::view("/login", "users/login")->name("login-form");
        Route::post("/login", "logIn")->name("login");

        Route::view("/signup", "users/signup")->name("signup-form");
        Route::post("/signup", "register")->name("signup");
    });
});


Route::controller(NotesController::class)->prefix("notes")->middleware(ProtectedRoute::class)->group(function () {
    Route::get("/", "index")->name("home");

    Route::get("/category/{id}", "indexWithFilter")->name("home-category");
    
    Route::get("/details/{id}", "show")->name("notes-details");
    
    Route::get("/new", "create")->name("form-new-note");
    Route::post("/new", "store")->name("create-note");


    Route::get("/update/{id}", "edit")->name("form-edit-note");
    Route::post("/update/{id}", "update")->name("update-note");

    Route::get("/delete/{id}", "destroy")->name("delete-note");
});


Route::controller(CategoriesController::class)->prefix("categories")->middleware(ProtectedRoute::class)->group(function () {
    Route::get("/", "index")->name("categories");

    Route::get("/new", "create")->name("form-new-category");
    Route::post("/new", "store")->name("create-category");


    Route::get("/update/{id}", "edit")->name("form-update-category");
    Route::post("/update/{id}", "update")->name("update-category");


    Route::get("/delete/{id}", "destroy")->name("delete-category");
});


// 404
Route::fallback(function () {
    return redirect()->route("home");
});
