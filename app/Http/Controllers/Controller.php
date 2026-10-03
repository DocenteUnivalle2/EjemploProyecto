<?php

namespace App\Http\Controllers;

abstract class Controller
{
    
    public function VerUsuarios() {
        return view('users.list');
    }

}
