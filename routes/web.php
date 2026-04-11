<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('profil');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/katalog', function () {
    return view('katalog');
});

Route::get('/bantu', function () {
    return view('bantu');
});
