<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;
use Validator;
use App\Models\MarcosCarro;

class CarrosController extends Controller {

    public function getIndex() {
        $carros = Carro::paginate(7);
        return view('carros.index', compact('carros'));
    }

    public function getAdicionar() {
        
        //busca toda as marcas de carros
        $marcas = MarcosCarro::lists('marca', 'id');
        
        return view('carros.create-edit', compact('marcas'));
    }

    public function postAdicionar(Request $request) {

        $dadosFormulario = $request->except('file');

        $validar = Validator::make($dadosFormulario, Carro::$rules);
        if ($validar->fails()) {
            return redirect('carros/adicionar')
                            ->withErrors($validar)
                            ->withInput();
        }
        $file = $request->file('file');

        if ($request->hasFile('file') && $file->isValid()) {
            $file->move('assets/uploads/images', $file->getClientOriginalName());
        }

        Carro::create($dadosFormulario);

        return redirect('carros');
    }

    public function getEditar($idCarro) {
        $carro = Carro::find($idCarro);
        
        $marcas = MarcosCarro::lists('marca', 'id');

        return view('carros.create-edit', compact('carro', 'marcas'));
    }

    public function postEditar(Request $request, $idcarro) {
        $dadosForm = $request->except('_token');

        $validar = Validator::make($dadosForm, Carro::$rules);
        if ($validar->fails()) {
            return redirect("carros/editar/$idcarro")
                            ->withErrors($validar)
                            ->withInput();
        }
        Carro::where('id', $idcarro)->update($dadosForm);

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
