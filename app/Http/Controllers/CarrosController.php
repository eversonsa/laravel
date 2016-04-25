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
        $dadosFormulario = $request->all();
        
        $rules = [
            'nome' => 'required|min:3|max:100',
            'placa' => 'required|min:7|max:7',
        ];
        $validar = Validator::make($dadosFormulario, $rules);
            if( $validar->fails() ){
                return redirect('carros/adicionar')
                      ->withErrors($validar)
                      ->withInput();
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