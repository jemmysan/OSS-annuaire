<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\PermissionController;

use App\Http\Controllers\ShareController;
use App\Http\Controllers\StartRegistreController;
use App\Http\Controllers\StartStatController;
use App\Http\Controllers\StartupController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
if ( file_exists( app_path( 'Http/Controllers/LocalizationController.php') ) )
{
  Route::get('lang/{locale}', 'LocalizationController@lang');
}
Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('user', 'UserController');
    Route::resource('permission', 'PermissionController');
    Route::resource('role', 'RoleController');
    Route::resource('startup', 'StartupController');

    Route::post('/financement/store', 'FinancementController@store')->name('financement.add');
    Route::post('/commentaire/store', 'CommentaireController@store')->name('commentaire.add');
    /*Route::post('/commentaire/store', 'CommAccompController@store')->name('commentairea.add');
    Route::post('/commentaire/store', 'CommFinanceController@store')->name('commentairef.add');*/


    Route::post('startup/{id}', [StartupController::class,'save_phase']);
    Route::resource('accompagnement', 'AccompagnementController');
    Route::resource('financiere', 'FinanciereController');
   Route::delete('financieres/{{id}}','FinanciereController@destroy' );
    Route::resource('tasks', 'TasksController');
    Route::resource('comments', 'CommentsController');
    Route::get('/startup/index',[StartupController::class,'search']);
    Route::get('/owner', function(){
        return "Owner of current team.";
    })->middleware('auth', 'teamowner');

    Route::get('statistiques',[StartStatController::class, 'index']);

    Route::get('import-export', [ImportExportController::class, 'importExport']);
    Route::post('import-file', [ImportExportController::class, 'importFile'])->name('import-file');
    Route::get('export-file', [ImportExportController::class, 'exportFile'])->name('export-file');
	Route::get('/getAllPermission',[PermissionController::class,'getAllPermissions']);
    Route::get("search","AccompagnementController@search");
	Route::get('importExportView', 'MyController@importExportView');
	Route::get('export', 'MyController@export')->name('export');
	Route::post('import', 'MyController@import')->name('import');
    Route::post('upload', 'StartupController@upload')->name('upload');
    Route::get('recherche', 'RechercheController@index')->name('recherche');
    Route::post('like', 'LikeController@like')->name('like');
    Route::delete('like', 'LikeController@unlike')->name('unlike');
});


    Route::get('/profil',[UserController::class,'profil'])->name('user.profil');
    Route::post('/profil',[UserController::class,'postProfil'])->name('user.postProfil');
    Route::get('/password/change',[UserController::class,'getPassword'])->name('userGetPassword');
    Route::post('/password/change',[UserController::class,'postPassword'])->name('userPostPassword');
    Auth::routes();
    Route::get('/emails/contact', [ContactController::class, 'create']);
    Route::post('/emails/contact', [ContactController::class, 'sendEmail'])->name('send.email');

    // Route::post('startup/{id}', [ShareController::class, 'share'])->name('share');


/**
 * Teamwork routes
 */
Route::group(['prefix' => 'teams', 'namespace' => 'Teamwork'], function()
{
    Route::get('/', [App\Http\Controllers\Teamwork\TeamController::class, 'index'])->name('teams.index');
    Route::get('create', [App\Http\Controllers\Teamwork\TeamController::class, 'create'])->name('teams.create');
    Route::post('teams', [App\Http\Controllers\Teamwork\TeamController::class, 'store'])->name('teams.store');
    Route::get('edit/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'edit'])->name('teams.edit');
    Route::put('edit/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'update'])->name('teams.update');
    Route::delete('destroy/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'destroy'])->name('teams.destroy');
    Route::get('switch/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'switchTeam'])->name('teams.switch');

    Route::get('members/{id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'show'])->name('teams.members.show');
    Route::get('members/resend/{invite_id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'resendInvite'])->name('teams.members.resend_invite');
    Route::post('members/{id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'invite'])->name('teams.members.invite');
    Route::delete('members/{id}/{user_id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'destroy'])->name('teams.members.destroy');

    Route::get('accept/{token}', [App\Http\Controllers\Teamwork\AuthController::class, 'acceptInvite'])->name('teams.accept_invite');

});
