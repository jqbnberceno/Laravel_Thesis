<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\TodoListController;
use App\http\Controllers\Main_Controller;
use App\http\Controllers\Product_Controller;
use App\http\Controllers\User_Controller;
use App\http\Controllers\Expenses_Controller;



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

Route::get('/', function () {
    return view('login');
});


// page routes 

Route::get('/Products',[Main_Controller::class, 'productPage']) 
->name('productPage');

Route::get('/Dashboard',[Main_Controller::class, 'dashboard'])
->name('dashboard');


// -----------


// product routes 

Route::post('/saveItemRoute',[TodoListController::class, 'saveItem']) 
->name('saveItem');

Route::get('/Products',[Main_Controller::class, 'productPage']) 
->name('productPage');

Route::get('/Home', [Main_Controller::class, 'homePage'])
->name('home');

Route::get('/AddProduct',[Main_Controller::class, 'addProduct']) 
->name('addprod');

Route::post('/Store',[Product_Controller::class, 'store']) 
->name('store');

Route::get('/products/{id}',[Product_Controller::class, 'show'])
->name('viewprod');

Route::get('/UpdateProducts/{id}',[Product_Controller::class, 'edit']) 
->name('editprod');

Route::put('/Update',[Product_Controller::class, 'update']) 
->name('update');

Route::delete('/Delete/{id}',[Product_Controller::class, 'destroy']) 
->name('delete');

Route::resource('products_table', Product_Controller::class);

// ----------

// expenses routes

Route::get('/Expenses',[Main_Controller::class, 'expense']) 
->name('expensePage');

Route::get('/AddExpenses', [Expenses_Controller::class, 'create'])
->name('productExpenses');

Route::post('/Add',[Expenses_Controller::class, 'store']) 
->name('Expense_store');

Route::get('/Expenses/{id}',[Expenses_Controller::class, 'show'])
->name('viewexpense');

Route::delete('/DeleteExpense/{id}',[Expenses_Controller::class, 'destroy']) 
->name('delete_exp');

Route::put('/UpdateExpense/{id}',[Expenses_Controller::class, 'update']) 
->name('update_exp');

Route::get('/UpdateExpense/{id}',[Expenses_Controller::class, 'edit']) 
->name('editexpense');



// ----------

// LOGIN ROUTES

Route::controller(User_Controller::class)->group(function(){

    Route::get('welcome', 'index')->name('login');

    Route::get('registration', 'registration')->name('registration');

    Route::get('logout', 'logout')->name('logout');

    Route::post('validate_registration', 'validate_registration')->name('welcome.validate_registration');

    Route::post('validate_login', 'validate_login')->name('welcome.validate_login');

    Route::get('products', 'products')->name('products');

// ----------

});



