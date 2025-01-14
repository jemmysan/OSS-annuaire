<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


use App\Http\Controllers\UserController;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\StatutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SecteurController;
use App\Http\Controllers\StartupController;
use App\Http\Controllers\RubriqueController;
use App\Http\Controllers\EvolutionController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\StartStatController;
use App\Http\Controllers\FinanciereController;
use App\Http\Controllers\IndicateurController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\FinancementController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\UniteMesureController;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\StartRegistreController;
use App\Http\Controllers\AccompagnementController;
use App\Http\Controllers\EvolutionStartupController;
use App\Http\Controllers\PhaseFinancementController;
use App\Http\Controllers\StartupIndicateurController;




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


Route::group(['middleware' => ['auth']], function(){
        Route::resource('user', 'UserController');
        Route::resource('permission', 'PermissionController');
        Route::resource('role', 'RoleController');
        Route::resource('startup', 'StartupController');


        Route::post('/financement/store', 'FinancementController@store')->name('financement.add');
        Route::post('/commentaire/store', 'CommentaireController@store')->name('commentaire.add');
        /*Route::post('/commentaire/store', 'CommAccompController@store')->name('commentairea.add');
        Route::post('/commentaire/store', 'CommFinanceController@store')->name('commentairef.add');*/



        
        Route::post('startup/strore', [StartupController::class,'store'])->name('store-startup');
        // Route::get('/startup/search',[StartupController::class,'recherche'])->name('startup-search');
        Route::post('startup/search',[StartupController::class,'search'])->name('search-startup');

        // Route::get('startup/index',[StartupController::class,'search'])->name('search-startup');
        Route::post('startup/{id}', [StartupController::class,'save_phase']);
        Route::get('startup/delete/{id}',[StartupController::class,'destroy'])->name('delete-startup');
        Route::post('/startup/add-evolution/{id}',[StartupController::class,'evolutionToStartup'])->name('addnewevolution');
        
        Route::resource('accompagnement', 'AccompagnementController');
        Route::prefix('accompagnement')->group(function(){
            Route::post('/create',[AccompagnementController::class,'store'])->name('accompagnement.create');
            Route::get('delete/{id}',[AccompagnementController::class,'destroy'])->name('delete-accompagnement');
            Route::post('search',[AccompagnementController::class,'search'])->name('search-accompagnement');
        });

        Route::resource('financiere', 'FinanciereController');
        Route::prefix('financiere')->group(function (){
            Route::get('/{id}',[FinanciereController::class,'destroy'])->name('delete-financement');
            Route::post('search',[FinanciereController::class,'search'])->name('financiere.search');
            Route::post('/create', [FinanciereController::class,'store'])->name('financiere.store');
        });

        Route::prefix('phase-financement')->group(function (){
            Route::get('/liste',[PhaseFinancementController::class,'index'])->name('phase-financement.index');
            Route::post('/store',[PhaseFinancementController::class,'store'])->name('phase-financement.store');
            Route::put('/update/{id}',[PhaseFinancementController::class,'update'])->name('phase-financement.update');
            Route::get('/delete/{id}',[PhaseFinancementController::class,'delete'])->name('phase-financement.delete');
            Route::post('/search',[PhaseFinancementController::class,'search'])->name('phase-financement.search');


        });
        
        Route::resource('tasks', 'TasksController');
        
        Route::resource('comments', 'CommentsController');
        

        Route::get('/startup/evolution/{id}', [EvolutionStartupController::class, 'getEvolutionStartup'])->name('startup.evolutions');
        Route::post('evolution/evolution-startup/{id}', [EvolutionStartupController::class, 'update'])->name('evolution.update');
        Route::get('/startup/files/{id}', [EvolutionStartupController::class, 'getFile'])->name('getfile');


        Route::prefix('evolution')->group(function (){
            Route::get('/index',[EvolutionController::class,'index'])->name('evolution');
            Route::get('/create',[EvolutionController::class,'create'])->name('ajout-evolution');
            Route::post('/store',[EvolutionController::class,'store'])->name('create-evolution');
            Route::post('/index', [EvolutionController::class, 'search'])->name('evolution.search');
            Route::get('/edit/{id}',[EvolutionController::class,'edit'])->name('edit-evolution');
            Route::put('/update/{id}',[EvolutionController::class,'update'])->name('update-evolution');
            Route::get('/delete/{id}',[EvolutionController::class,'destroy'])->name('delete-evolution');
            Route::get('/evolution-startup/{id}',[EvolutionStartupController::class,'index'])->name('view-evo-startup');
            Route::post('/evolution-startup',[EvolutionStartupController::class,'store'])->name('add-evo-startup');

            
            

        });

        
        Route::prefix('phase')->group(function (){
            // Route::get('/index',[PhaseController::class,'index'])->name('phase');
            Route::post('/store',[PhaseController::class,'store'])->name('phase.create');
            

        });

        Route::prefix('statut')->group(function (){
            Route::get('/list',[StatutController::class,'index'])->name('statut.index');
            Route::post('/store',[StatutController::class,'store'])->name('statut.store');
            Route::put('/update/{id}',[StatutController::class,'update'])->name('statut.update');
            Route::get('/delete/{id}',[StatutController::class,'delete'])->name('statut.delete');
            Route::post('/search',[StatutController::class,'search'])->name('statut.search');
            Route::post('/startup/statut/add/{idStartup}',[StatutController::class,'saveStatutStartup'])->name('statut.startup');
        });

        Route::prefix('secteur')->group(function (){
            Route::get('/list',[SecteurController::class,'index'])->name('secteur.index');
            Route::post('/store',[SecteurController::class,'store'])->name('secteur.store');
            Route::put('/update/{id}',[SecteurController::class,'update'])->name('secteur.update');
            Route::post('/delete/{id}',[SecteurController::class,'destroy'])->name('secteur.delete');
            Route::post('/search',[SecteurController::class,'search'])->name('secteur.search');
        });

        Route::prefix('rubrique')->group(function (){
            Route::get('/index',[RubriqueController::class,'index'])->name('rubrique.index');
            Route::post('/create',[RubriqueController::class,'store'])->name('rubrique.store');
            Route::post('/index',[RubriqueController::class,'search'])->name('rubrique.search');
            Route::put('/update/{id}',[RubriqueController::class,'update'])->name('rubrique.update');
            Route::get('/delete/{id}',[RubriqueController::class,'delete'])->name('rubrique.delete');
        });
        
        Route::prefix('/formation')->group(function (){
            Route::get('/index',[FormationController::class,'index'])->name('formation.index');
            Route::prefix('/cours')->group(function (){
                Route::get('/show/{id}',[FormationController::class,'coursIndex'])->name('cours.show');
                Route::get('/create',[FormationController::class,'coursStoreView'])->name('cours.create');
                Route::post('/store',[FormationController::class,'coursStore'])->name('cours.store');
                Route::get('/update/{id}',[FormationController::class,'viewUpdateCours'])->name('cours.show.update');
                Route::post('/update/{id}',[FormationController::class,'updateCours'])->name('cours.update');
                Route::get('/delete/{id}',[FormationController::class,'destroyCours'])->name('cours.delete');
            });

        });

        Route::prefix('/unite-mesure')->group(function (){
            Route::get('/index',[UniteMesureController::class,'index'])->name('mesure.index');
            Route::post('/store',[UniteMesureController::class,'store'])->name('mesure.store');
            Route::put('/update/{id}',[UniteMesureController::class,'update'])->name('mesure.update');
            Route::get('/delete/{id}',[UniteMesureController::class,'delete'])->name('mesure.delete');
            Route::post('/search',[UniteMesureController::class,'search'])->name('mesure.search');
           
        });

        Route::prefix('/indicateur')->group(function (){
            Route::get('/index',[IndicateurController::class,'index'])->name('indicateur.index');
            Route::post('/store',[IndicateurController::class,'store'])->name('indicateur.store');
            Route::post('/update/{id}',[IndicateurController::class,'update'])->name('indicateur.update');
            Route::get('/delete/{id}',[IndicateurController::class,'delete'])->name('indicateur.delete');
            Route::post('/search',[IndicateurController::class,'search'])->name('indicateur.search');
        });

        Route::prefix('startup/indicateur')->group(function (){
            Route::get('/index',[StartupIndicateurController::class,'index'])->name('startup-indicateurs.index');
            Route::get('/show/{id}',[StartupIndicateurController::class,'show'])->name('startup-indicateurs.show');
            Route::post('/add',[StartupIndicateurController::class,'store'])->name('startup-indicateurs.add');
            Route::post('/update/{id}',[StartupIndicateurController::class,'update'])->name('startup-indicateurs.update');
            Route::get('/delete/{id}',[StartupIndicateurController::class,'delete'])->name('startup-indicateurs.delete');
            Route::post('/search',[StartupIndicateurController::class,'searchStartUp'])->name('startup-indicateurs.searchStartup');
            Route::post('/search/{id}',[StartupIndicateurController::class,'searchIndicateurStartup'])->name('startup-indicateurs.searchIndicateurStartup');


        });



        // STATISTIC ROUTES
        Route::get('statistiques',[StartStatController::class, 'index']);


        // IMPORT / EXPORT ROUTES
        // Route::get('import-export', [ImportExportController::class, 'importExport']);
        Route::post('import-file', [ImportExportController::class, 'importFile'])->name('import-file');
        Route::get('export-file', [ImportExportController::class, 'exportFile'])->name('export-file');
        Route::get('/getAllPermission',[PermissionController::class,'getAllPermissions']);
        Route::get("search","AccompagnementController@search");
        // Route::get('importExportView', 'MyController@importExportView');
        Route::get('Import-Export',[ImportExportController::class, 'importExport'])->name('import-export');
        Route::get('export', 'MyController@export')->name('export');
        Route::post('import', 'MyController@import')->name('import');
        Route::post('upload', 'StartupController@upload')->name('upload');
        Route::get('recherche', 'RechercheController@index')->name('recherche');
        Route::post('like', 'LikeController@like')->name('like');
        Route::delete('like', 'LikeController@unlike')->name('unlike');

        Route::group(['prefix' => 'teams', 'namespace' => 'Teamwork'], function(){
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
        });
        
       
        
        Route::get('/owner', function(){
            return "Owner of current team.";
        }

    )->middleware('auth', 'teamowner');






    







    Route::get('/profil',[UserController::class,'profil'])->name('user.profil');
    Route::post('/profil',[UserController::class,'postProfil'])->name('user.postProfil');
    Route::get('/password/change',[UserController::class,'getPassword'])->name('userGetPassword');
    Route::post('/password/change',[UserController::class,'postPassword'])->name('userPostPassword');
    Auth::routes();
    Route::get('/emails/contact', [ContactController::class, 'create']);
    Route::post('/emails/contact', [ContactController::class, 'sendEmail'])->name('send.email');


    // Route::post('startup/{id}', [ShareController::class, 'share'])->name('share');