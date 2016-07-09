<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DashboardController
 *
 * @author rw65
 */
namespace App\Http\Controllers\Dashboard;

use App\User;
//use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {
    
    public function getIndex() {
        if (Auth::check()) {
            return view('dashboard');
        } else {
            return view('welcome');
        }
    }
    
}
