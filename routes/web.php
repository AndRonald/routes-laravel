<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    echo "<h1> Você está na pág inicial! </h1>";
})->name('home');

Route::get('/user/{id}', function (string $id) {
    echo "<h1> Bem vindo, $id </h1>";
})->where(['id' => '[a-zA-Z]+'])->name('user.profile');

Route::get(('/post/{slug}'), function(string $slug){
    echo "<h1>Post sobre: $slug</h1>";
})->where(['slug' => '[a-zA-Z]+'])->name('blog.post');

Route::get(('/category/{category}'), function(string $category){
    echo "<h1> Você está na categoria: $category</h1>";
})->where(['category' => '[a-zA-Z]+'])->name('blog.category');

Route::get(('/user/{id}/language/{lang?}'), function(string $id, string $lang = null){
    echo "<h1>Bem vindo, $id!</h1>";
    if($lang != null){
        echo "<h2>Idioma escolhido: $lang</h2>";
    }else{
        echo "<h2>Idioma: Padrão</h2>";
    }
})->where(['id' => '[a-zA-Z]+'])->name('user.profile.language');

Route::get('/product/{category}/{minPrice?}', function(string $category, float $minPrice = 0) {
    echo "<h1> Você está na categoria: $category </h1>";
    if ($minPrice != null){
        echo "<h2> Valor minimo, é: $minPrice </h2>";
    }else{
        echo "<h2> Valor minimo: Não escolheu valor minimo </h2>";
    }
})->where(['category' => '[a-zA-Z]+', 'mimPrice' => '[0-9]+'])->name('products.category.price');

Route::get(('/page/{page}'), function (int $page) {
    echo "<h1>voce está na page: $page</h1>";
})->where(['page' => '[0-9]+'])->name('page.number');

Route::get('/convert/{currency}', function (int $currency){
    echo "conversor de real para dollar: " . $currency * (4.94);
})->where(['currency' => '[/^\d+(\.\d{1,2})?$/]'])->name('currency.converter');

Route::get('/sum/{number1}/{number2}', function(int $number1, int $number2){
    echo "<h1>Resultado da soma = " . $number1 + $number2 . "</h1>";
})->where(['number1' => '[0-9]+', 'number2' => '[0-9]+'])->name('sum.numbers');

Route::get(('/classes/{name}'), function($name){
    echo "<h1>Nome da aula que você está assistindo: $name</h1>";
})->where('name', '[a-zA-Z0-9]+')->name('classes.name');
