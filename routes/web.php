
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/about", function () {
    $name = 'tariq ziad timraz';

    $departments = [
        '1' => 'Ticnical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];

    return view('about', compact('name', 'departments'));
});

Route::post("/about", function (Request $request) {

    $name = $request->name;

    $departments = [
        '1' => 'Ticnical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];

    return view('about', compact('name', 'departments'));
});

Route::get("/tasks", function () {

    return view('tasks');
});

Route::post("/create", function (Request $request) {

    $task_name = $_POST['name'];

    DB::table('tasks')->insert(['name'=>$task_name]);
    return view('tasks');
});
