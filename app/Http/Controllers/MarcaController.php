<?php

namespace App\Http\Controllers;

use App\Models\MarcosCarro;
use Illuminate\Http\Request;

class MarcaController extends Controller{
 
    private $marca;
    private $request;
    
    public function __construct(MarcosCarro $marca, Request $request ) {
        $this->marca = $marca;
        $this->request = $request;
        
    }
    
    public function getIndex() {
        
        $marcaCarro = $this->marca->all();
        
        return view('marca.index', compact('marcaCarro'));
    }
    
    public function getAdicionar() {
        
        return view('marca.create-edit');
    }
    
    public function postAdicionar() {
        
        $dadosFormularioRecebedio = $this->request->all();
        $this->marca->create($dadosFormularioRecebedio);
        
        return redirect('marca');
    }
}