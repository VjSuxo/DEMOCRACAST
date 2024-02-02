<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminEleccionController;
use App\Http\Controllers\AdminPersonaController;
use App\Http\Controllers\AdminCandidatoController;
use App\Http\Controllers\enlaceVotacionController;
use App\Http\Controllers\VotacionController;
use App\Models\EleccionCandidato;

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
    return view('welcome');
})->name('inicio');

Route::controller(enlaceVotacionController::class)->group(function(){
    Route::get('/listaElecciones','indexLista')->name('listaElecciones');
    Route::get('/elecciones/{eleccion}','index')->name('elecciones');
});

Route::controller(VotacionController::class)->group(function(){
    Route::get('/elegirAlcandidato/{eleccion}/{persona}','votarCandidato')->name('elegirA');
});


Auth::routes();
// Route User
Route::middleware(['auth','user-role:user'])->group(function()
{
    Route::get("/home",[HomeController::class, 'userHome'])->name("home");
});
// Route Controlador
Route::middleware(['auth','user-role:editor'])->group(function()
{
    Route::get("/editor/home",[HomeController::class, 'editorHome'])->name("editor.home");
});
// Route Admin
Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::controller(AdminController::class)->group(function(){
        Route::get("/admin/home",'adminHome')->name("admin.home");
        Route::get("/admin/gestion/Elecciones",'adminElecciones')->name("admin.gElecciones");
        Route::get("/admin/gestion/Usuarios",'adminUsuarios')->name("admin.gUsuarios");
        Route::get("/admin/gestion/Candidatos/{eleccion}",'adminGCandidatos')->name("admin.gCandidatos");
    });

    Route::controller(AdminEleccionController::class)->group(function(){
        Route::get("/admin/gestion/Elecciones/crear",'index')->name("admin.crearElecciones");
        Route::get("/admin/gestion/Elecciones/editar/{eleccion}",'indexEdit')->name("admin.editarElecciones");
        Route::post("/admin/gestion/Elecciones/btnCrear",'store')->name("admin.crearElecciones.Store");

        Route::get("/admin/eleccions/{eleccion}/statss/",'')->name('admin.eleccion.estats');

    });
    Route::controller(AdminCandidatoController::class)->group(function(){
        Route::post("/admin/gestion/Elecciones/crear/{eleccion}",'store')->name("admin.storeCandidato");
    });
    Route::controller(AdminPersonaController::class)->group(function(){
        Route::post("/admin/gestion/usuaio/store",'store')->name("admin.storePersona");
    });


});
