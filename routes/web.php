<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/', [HomeController::class,'index']);
route::get('/redirect', [HomeController::class,'redirect']);
route::get('/deleteuser/{id}', [AdminController::class,'deleteuser']);
route::get('/newuser', [AdminController::class,'newuser']);
route::get('/drivers', [AdminController::class,'drivers']);
route::get('/users', [AdminController::class,'users']);
route::get('/newdriver', [AdminController::class,'newdriver']);
route::post('/driver_data', [AdminController::class,'driver_data']);
route::get('/deletedriver/{id}', [AdminController::class,'deletedriver']);
route::get('/editdriver/{id}', [AdminController::class,'editdriver']);
route::post('/updatedriver/{id}', [AdminController::class,'updatedriver']);
route::get('/vehicles', [AdminController::class,'vehicles']);
route::get('/newvehicle', [AdminController::class,'newvehicle']);
route::post('/vehicle_data', [AdminController::class,'vehicle_data']);
route::get('/deletevehicle/{id}', [AdminController::class,'deletevehicle']);
route::get('/editvehicle/{id}', [AdminController::class,'editvehicle']);
route::post('/updatevehicle/{id}', [AdminController::class,'updatevehicle']);
route::get('/spare_suppliers', [AdminController::class,'spare_suppliers']);
route::get('/newsupplier', [AdminController::class,'newsupplier']);
route::post('/supplier_data', [AdminController::class,'supplier_data']);
route::get('/delete_supplier/{id}', [AdminController::class,'delete_supplier']);
route::get('/editsupplier/{id}', [AdminController::class,'editsupplier']);
route::get('/garages', [AdminController::class,'garages']);
route::get('/newgarage', [AdminController::class,'newgarage']);
route::post('/garage_data', [AdminController::class,'garage_data']);
route::get('/deletegarage/{id}', [AdminController::class,'deletegarage']);
route::get('/deleterepair/{id}', [AdminController::class,'deleterepair']);
route::get('/editgarage/{id}', [AdminController::class,'editgarage']);
route::post('/updategarage/{id}', [AdminController::class,'updategarage']);
route::get('/mechanics', [AdminController::class,'mechanics']);
route::get('/newmechanic', [AdminController::class,'newmechanic']);
route::post('/mechanic_data', [AdminController::class,'mechanic_data']);
route::get('/deletemechanic/{id}', [AdminController::class,'deletemechanic']);
route::get('/spare_parts', [AdminController::class,'spare_parts']);
route::get('/newsparepart', [AdminController::class,'newsparepart']);
route::post('/spare_data', [AdminController::class,'spare_data']);
route::get('/delete_sparepart/{id}', [AdminController::class,'delete_sparepart']);
route::get('/repairs', [AdminController::class,'repairs']);
route::get('/services', [AdminController::class,'services']);
route::get('/download/{image}', [AdminController::class,'download']);
route::get('/downloadrepair/{image}', [AdminController::class,'downloadrepair']);
route::get('/downloadfile/{file}', [AdminController::class,'downloadfile']);
route::get('/newrepairs', [AdminController::class,'newrepairs']);
route::post('/repair_data', [AdminController::class,'repair_data']);
route::get('/approvedrepairs', [AdminController::class,'approvedrepairs']);
route::get('/completedrepairs', [AdminController::class,'completedrepairs']);
route::get('/rejectedrepairs', [AdminController::class,'rejectedrepairs']);
route::get('/approve/{id}', [AdminController::class,'approve']);
route::get('/complete/{id}', [AdminController::class,'complete']);
route::post('/reject_data/{id}', [AdminController::class,'reject_data']);
route::get('/rejecting/{id}', [AdminController::class,'rejecting']);
route::get('/driver_reportings', [AdminController::class,'driver_reportings']);
route::get('/received/{id}', [AdminController::class,'received']);
route::get('/downloadreporting/{image}', [AdminController::class,'downloadreporting']);
route::get('/editrepair/{id}', [AdminController::class,'editrepair']);
route::post('/editrepair_data/{id}', [AdminController::class,'editrepair_data']);
route::get('/newservice', [AdminController::class,'newservice']);
route::post('/servicedata', [AdminController::class,'servicedata']);
route::get('/deleteservice/{id}', [AdminController::class,'deleteservice']);
route::get('/updateservice/{id}', [AdminController::class,'updateservice']);
//export
route::get('/export', [AdminController::class,'export']);
route::get('/exportpending', [AdminController::class,'exportpending']);
route::get('/exportapproved', [AdminController::class,'exportapproved']);
route::get('/exportrejected', [AdminController::class,'exportrejected']);

//search
route::get('/searchcomplete', [AdminController::class,'searchcomplete']);
route::get('/searchapprove', [AdminController::class,'searchapprove']);
route::get('/searchpending', [AdminController::class,'searchpending']);
route::get('/searchrejected', [AdminController::class,'searchrejected']);
route::get('/searchspare', [AdminController::class,'searchspare']);
route::get('/completedpdf', [AdminController::class,'completedpdf']);


//driver
route::get('/reportrepairs', [HomeController::class,'reportrepairs']);
route::post('/report_data', [HomeController::class,'report_data']);
route::get('/reported', [HomeController::class,'reported']);
route::get('/cancelreporting/{id}', [HomeController::class,'cancelreporting']);