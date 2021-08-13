<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {
    Route::resource('ipa_oct2', \Antron\Ipa\Http\Controllers\IpaOct2Controller::class);
    Route::resource('ipa_oct3', \Antron\Ipa\Http\Controllers\IpaOct3Controller::class);
    Route::resource('ipa_oct4', \Antron\Ipa\Http\Controllers\IpaOct4Controller::class);
});
