<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BurgerController extends Controller
{
    public function index(){
        return view('burgerForm');
    }
}
