<?php

namespace App\Http\Controllers;

class CarrosController extends Controller
{
    public function getIndex(){
        return view('carros.index');
    }
    public function getAdicionar(){
        return view('carros.create-edit');
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

