<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class TemaController extends Controller
{
    public function setTema($color)
    {
        $cookie = Cookie::make('tema_preferido', $color, 14400);

        return back()->withCookie($cookie);
    }

    public function eliminarTema()
    {
        $cookie = Cookie::forget('tema_preferido');
        return back()->withCookie($cookie);
    }
}
