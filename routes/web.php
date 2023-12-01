<?php



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;

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

/** for side bar menu active */
function set_active($route)
{
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}
Route::get('/', function () {
    return view('layouts.master');
});

Route::controller(HomeController::class)->group(function () {

    Route::get('/home', 'index')->name('home');
    Route::get('user/profile/page', 'userProfile')->name('user/profile/page');
    Route::get('teacher/dashboard', 'teacherDashboardIndex')->name('teacher/dashboard');
    Route::get('student/dashboard', 'studentDashboardIndex')->name('student/dashboard');
});


Route::controller(UsuarioController::class)->group(function () {

    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('create', 'create')->name('auth.create');
    Route::post('iniciarSesion', 'iniciarSesion')->name('auth.iniciarSesion');
});
