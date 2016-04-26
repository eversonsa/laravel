<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;
use Validator;

class CarrosController extends Controller
{
    public function getIndex(){
        $carros = Carro::paginate(2);
        return view('carros.index', compact('carros'));
    }
    public function getAdicionar(){
        return view('carros.create-edit');
    }
    public function postAdicionar(Request $request) {
        $dadosFormulario = $request->except('file');
        
        $validar = Validator::make($dadosFormulario, Carro::$rules);
            
            $file = $request->file('file');
            
            if ( $request->hasFile('file') && $file->isValid()){
                $file->move('assets/uploads/images', $file->getClientOriginalName());
            }
        
        Carro::create($dadosFormulario);
        return redirect('carros');
    }
    public function getEditar($idCarro) {
        $carro = Carro::find($idCarro);
        
        return view('carros.create-edit', compact('carro'));
    }
    public function postEditar(Request $request, $idcarro) {
        $dadosFormulario = $request->except('_token');
        
         $validar = Validator::make($dadosFormulario, Carro::$rules);
         if( $validar->fails() ){
                return redirect("carros/editar/$idcarro")
                      ->withErrors($validar)
                      ->withInput();
            }
        Carro::where('id', $idcarro)->update($dadosFormulario);
        
        return redirect('carros/index');
    }
    public function getDeletar($idCarro) {
        
        $carro = Carro::find($idCarro);
        $carro->delete();
        return redirect('carros/index');
    }
    
    public function missingMethod($param = array()) {
        return "erro 404 pagina nao encontrada";
    }
}