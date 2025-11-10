<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//test route

Route::get('/testTemplate',function (){
    return view('panel.layout.app');
});
