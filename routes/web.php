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
    return view('auth.login');
});





Route::group(['middleware' => ['Authcheck']], function () {

    Route::get('/login', [UsuarioController::class, 'login'])->name('login');
    Route::get('/register', [UsuarioController::class, 'register'])->name('register');
    Route::get('create', [UsuarioController::class, 'create'])->name('auth.create');
    Route::post('iniciarSesion', [UsuarioController::class, 'iniciarSesion'])->name('auth.iniciarSesion');
    Route::get('logout', [UsuarioController::class, 'logout'])->name('auth.logout');







    Route::controller(HomeController::class)->group(function () {

        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('user/profile/page', [HomeController::class, 'userProfile'])->name('user/profile/page');
        Route::get('teacher/dashboard', [HomeController::class, 'teacherDashboardIndex'])->name('teacher/dashboard');
        Route::get('student/dashboard', [HomeController::class, 'studentDashboardIndex'])->name('student/dashboard');
    });
});
