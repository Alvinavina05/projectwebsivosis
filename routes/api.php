<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\AkunApiCtrl;

Route::get('/akun/tampil', [AkunApiCtrl::class, 'index']);
Route::get('/akun/tampil/{nis_nips}', [AkunApiCtrl::class, 'show']);
// Route::get('/akun/tampil/user/{user}', [AkunApiCtrl::class, 'showuser']);
Route::post('/akun/tambah', [AkunApiCtrl::class, 'store']);
Route::put('/akun/update/{nis_nips}', [AkunApiCtrl::class, 'update']);
Route::delete('/akun/hapus/{nis_nips}', [AkunApiCtrl::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
