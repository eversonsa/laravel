<?php

namespace App\Http\Controllers;

use App\Models\CoresCarro;
use Illuminate\Http\Request;

class CoresController extends Controller{
    
    private $corCarro;
    private $request;
    
    public function __construct(CoresCarro $corCarro,Request $request) {
        $this->corCarro = $corCarro;
        $this->request = $request;
    }


    public function getIndex() {
        
        $cor = $this->corCarro->all();
        
        return view('cor.index', compact('cor'));
    }
    
    public function getAdicionar() {
        
        return view('cor.create-edit');
    }
    
    public function postAdicionar() {
       
        $dadosRecebidos = $this->request->all();
        $this->corCarro->create($dadosRecebidos);
        
        return redirect('cor');
    }
    
}