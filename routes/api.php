<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistroController;
use App\Models\Registro;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/registros/{id}', [RegistroController::class, 'getData']);

Route::get('/registros', function (Request $request) {
  $filters = [
    'deleted',
    'type',
    'is_identified',
  ];
  $data = Registro::query();

  foreach ($filters as $filter) {
    $filterValue = $request->query($filter);

    $data = isset($filterValue) ? $data->where($filter, $filterValue) : $data;
  }

  return $data->get();
});
