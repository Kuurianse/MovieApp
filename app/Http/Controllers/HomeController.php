<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        if(request()->authenticated == true){
            $temp = 'true';
        } else {
            $temp = 'false'; 
        }
        $temp;
        
        return 'Home Page ' . $temp;
    }
}
