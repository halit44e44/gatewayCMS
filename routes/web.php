<?php

use App\Http\Controllers\AjaxMainController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Isbank\IsbankController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PayTransaction\PayTransactionController;
use App\Http\Controllers\PayTransaction\WaitTransactionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Teqpay\TeqpayController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return redirect('/dashboard');
// });


Route::middleware(['auth'])->group(function () {
    Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
    Route::get('/', function () {
        //return view('dashboard');
        return view('index');
    })->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    //Route::post('companies/details', [CompanyController::class,'details'])->name('companies.details');
    Route::resource('companies', CompanyController::class);
    Route::get('/paymentMethods/showDetails/{id}', [PaymentMethodController::class,'showDetails'])->name('paymentMethods.showDetails');
    Route::resource('paymentMethods', PaymentMethodController::class);
    Route::resource('payTransactions', PayTransactionController::class);
    Route::get('/flagStatus',[WaitTransactionController::class,'flagStatus'])->name('waitTransactions.flagStatus');
    Route::post('/pushData',[WaitTransactionController::class,'pushData'])->name('waitTransactions.pushData');
    Route::resource('waitTransactions', WaitTransactionController::class);
    Route::resource('permission', RoleController::class);
    Route::resource('teqpays', TeqpayController::class);
    Route::resource('isbank', IsbankController::class);
    Route::get('ajaxData', [AjaxMainController::class, 'getAjaxData'])->name('getAjaxData');  
});
Route::get('media',[MediaController::class,'index']);



require __DIR__ . '/auth.php';
