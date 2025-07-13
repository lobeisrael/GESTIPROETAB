<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardEnseignant extends Controller
{
    public function index() {
        //
        return view('enseignant.dashboard');
    }
}
