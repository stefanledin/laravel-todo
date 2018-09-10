<?php

Route::get('/', function () {
    $todos = App\Todo::all();
    return view('index', ['todos' => $todos]);
});

Route::resource('todos', 'TodoController');
