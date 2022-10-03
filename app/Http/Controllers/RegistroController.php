<?php

namespace App\Http\Controllers;

use App\Models\Registro;

class RegistroController extends Controller
{
    public function getData($id)
    {
        $registros = Registro::findOrFail($id);

        return $registros;
    }
}