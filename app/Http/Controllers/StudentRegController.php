<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentRegController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function search_section($class){

        $user = DB::table('define_sections')->where('class_name', $class)->get();
        return $user;

    }
}
