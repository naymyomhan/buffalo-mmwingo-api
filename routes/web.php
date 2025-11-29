<?php

use App\Models\SettingTwo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/privacy-policy', function () {
    $setting = SettingTwo::first();
    return view('live22', compact('setting'));
});
