<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index(){
        return view('template.index');
    }
    public function mentor(){
        return view('Mentor.index');
    }
}
