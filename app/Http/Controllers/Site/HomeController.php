<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class HomeController extends Controller 
{
    public function getIndex(){
        return view('site.home.index');
    }
    
    public function getContatto() {
        return view('site.contato.contato');
    }
    
    public function getSobre(){
        return view('site.sobre.sobre');
    }
    
    public function missingMethod($param = array()) {
        return view('site.404.erro');
    }
}


