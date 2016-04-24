<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Carro;
use Illuminate\Http\Request;

class CarrosController extends Controller
{
    public function getIndex(){
        $carros = Carro::get();
        return view('carros.index', compact('carros'));
    }
    public function getAdicionar(){
        return view('carros.create-edit');
    }
    public function postAdicionar(Request $request) {
        $dadosFormulario = $request->all();
        Carro::create($dadosFormulario);
        return redirect('carros');
    }
    public function getEditar($idCarro) {
        return view('carros.create-edit', ['idCarro' => $idCarro]);
    }
    public function postEditar($array = array()) {
        return "editando o carro";
    }
    public function getDeletar($idCarro) {
        return view('carros.deletar');
    }
    public function missingMethod($param = array()) {
        return 'erro 404 NOT FOUND';
    }
}

