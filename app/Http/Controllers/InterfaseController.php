<?php

namespace App\Http\Controllers;

use App\Models\Interfase;
use Illuminate\Http\Request;

class InterfaseController extends Controller
{
    public function index(Interfase $interface)
    {
        return view('interfaces.index',compact('interface'));
    }
}
