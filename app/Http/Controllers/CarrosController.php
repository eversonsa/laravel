<?php

namespace App\Http\Controllers;
<<<<<<< HEAD

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
        $carro = Carro::find($idCarro);
        
        return view('carros.create-edit', compact('carro'));
    }
    public function postEditar(Request $request, $idcarro) {
        $dadosFormulario = $request->except('_token');
        Carro::where('id', $idcarro)->update($dadosFormulario);
        
        return redirect('carros/index');
    }
    public function getDeletar($idCarro) {
        return view('carros.deletar');
        
=======
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
>>>>>>> origin/master
    }
    public function missingMethod($param = array()) {
        return 'erro 404 NOT FOUND';
    }
}

