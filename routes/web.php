<?php

use App\Http\Controllers\EntController;
use App\Http\Controllers\FullCalendarEventMasterController;
use App\Http\Controllers\FullCalendarEventAppointmentMasterController;
use App\Http\Controllers\NewsController;

use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function() {

    /**
     * Pages du controller Ent
     */
    Route::get('/ent', [EntController::class, 'index'])->name('ent.home');

    //Route::post('/ent/s', [EntController::class, 'update'])->name('ent.update');

    Route::get('/campus', function () {
        return view('/ent/campus');
    });

    Route::get('/scolarite', function () {
        return view('/ent/scolarite');
    });

    Route::get('/intranet', function () {
        return view('/ent/intranet');
    });

    Route::get('/aide', function () {
        return view('/ent/aide');
    });

    Route::get('/bureau_virtuel', function () {
        return view('/ent/bureau');
    });

    Route::get('/documentation', function () {
        return view('ent/documentation');
    });

    /**
     * Pages du controller News
    */
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/new/{id}', [NewsController::class, 'show'])->name('news.show');

    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');

    Route::get('/new/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
    Route::post('new/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::get('/new/destroy/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    // Rendez_vous
    Route::get('/rendez_vous', function () {
        return view('/ent/rendez_vous');
    })->name('ent.rendez_vous');
    Route::resource('event',FullCalendarEventAppointmentMasterController::class);
    Route::get('/fullcalendareventappointmentmaster',[FullCalendarEventAppointmentMasterController::class,'index']);
    Route::get('/fullcalendareventappointmentmaster/show',[FullCalendarEventAppointmentMasterController::class,'show']);
    Route::get('/fullcalendareventappointmentmaster/showOwn',[FullCalendarEventAppointmentMasterController::class,'showOwn']);
    Route::get('/fullcalendareventappointmentmaster/showall',[FullCalendarEventAppointmentMasterController::class,'showall']);

    Route::post('/fullcalendareventappointmentmaster/create',[FullCalendarEventAppointmentMasterController::class,'create']);
    Route::post('/fullcalendareventappointmentmaster/createDispo',[FullCalendarEventAppointmentMasterController::class,'createDispo']);

    Route::post('/fullcalendareventappointmentmaster/update',[FullCalendarEventAppointmentMasterController::class,'update']);

    Route::post('/fullcalendareventappointmentmaster/delete',[FullCalendarEventAppointmentMasterController::class,'destroy']);



    // Fullcalender
    Route::get('/agenda', function () {
        return view('/ent/agenda');
    })->name('ent.agenda');
    Route::resource('eventAgenda',FullCalendarEventMasterController::class);

    Route::get('/fullcalendareventmaster',[FullCalendarEventMasterController::class,'index']);
    Route::get('/fullcalendareventmaster/show',[FullCalendarEventMasterController::class,'show']);

    Route::post('/fullcalendareventmaster/create',[FullCalendarEventMasterController::class,'create']);

    Route::post('/fullcalendareventmaster/update',[FullCalendarEventMasterController::class,'update']);

    Route::post('/fullcalendareventmaster/delete',[FullCalendarEventMasterController::class,'destroy']);

});
