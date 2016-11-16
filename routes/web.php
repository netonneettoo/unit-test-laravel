<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/form', function () {
    return view('form');
});

Route::post('/form-result', function (\Illuminate\Http\Request $request) {

    $undefined = -1;
    $male = 0;
    $female = 1;

    $letters = [
        'o' => $male,
        'a' => $female
    ];

    $colors = [
        'red' => $female,
        'violet' => $female,
        'yellow' => $female,
        'green' => $male,
        'blue' => $male
    ];

    $result = [];

    $name = $request->get('name');
    if (strlen($name)) {
        $letter = $name[strlen($name) - 1];
        $letterSearch = array_search($letter, array_keys($letters));
        if ($letterSearch !== false) {
            $result['nameGender'] = $letters[$letter];
        } else {
            $result['nameGender'] = $undefined;
        }
    }

    $color = $request->get('color');
    $arraySearch = array_search($color, array_keys($colors));
    if ($arraySearch !== false) {
        $result['colorGender'] = $colors[$color];
    }

    if ($result['nameGender'] == $male) {
        $result[''] = '';
    } else if($result['nameGender'] == $female) {
        $result[''] = '';
    } else {
        $result[''] = '';
    }

    return $result;
});
