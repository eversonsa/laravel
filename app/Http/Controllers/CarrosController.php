<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;
use App\Models\MarcosCarro;

class CarrosController extends Controller {

    private $carro;
    private $request;
    private $marcaCarro;
    private $validar;

    public function __construct(Carro $carro, Request $request, MarcosCarro $marcaCarro, \Illuminate\Validation\Factory $validar) {
        $this->carro = $carro;
        $this->request = $request;
        $this->marcaCarro = $marcaCarro;
        $this->validar = $validar;
    }

    public function getIndex() {
        $carros = $this->carro->paginate(7);

        //busca toda as marcas de carros
        $marcas = $this->marcaCarro->lists('marca', 'id');

        return view('carros.index', compact('carros', 'marcas'));
    }

    public function getAdicionar() {

        //busca toda as marcas de carros
        $marcas = $this->marcaCarro->lists('marca', 'id');

        return view('carros.create-edit', compact('marcas'));
    }

    public function postAdicionar() {

        $dadosFormulario = $this->request->except('_token');

        $validar = $this->validar->make($dadosFormulario, Carro::$rules);

        if ($validar->fails()) {
            return redirect('carros/adicionar')
                            ->withErrors($validar)
                            ->withInput();
        }
        $file = $this->request->file('file');

        if ($this->request->hasFile('file') && $file->isValid()) {
            $file->move('assets/uploads/images', $file->getClientOriginalName());
        }

        $this->carro->create($dadosFormulario);

        return redirect('carros');
    }

    public function postAdicionarViaAjax() {

        $dadosFormulario = $this->request->except('file');

         $validar = $this->validar->make($dadosFormulario, Carro::$rules);

        if ($validar->fails()) {
            $messages = $validar->messages();

            $displayErros = '';

            foreach ($messages->all("<P>:message</p>") as $erro) {
                $displayErros .= $erro;
            }

            return $displayErros;
        }


        $this->carro->create($dadosFormulario);

        return 1;
    }

    public function getEditar($idCarro) {
        $carro = $this->carro->find($idCarro);

        $marcas = $this->marcaCarro->lists('marca', 'id');

        return view('carros.create-edit', compact('carro', 'marcas'));
    }

    public function postEditar($idcarro) {
        $dadosForm = $this->request->except('_token');

        $rulesEdit = [
            'nome' => 'required|min:3|max:100',
            'placa' => "required|min:7|max:7|unique:carros,placa, $idcarro",
        ];

        $validar = Validator::make($dadosForm, $rulesEdit);
        if ($validar->fails()) {
            return redirect("carros/editar/$idcarro")
                            ->withErrors($validar)
                            ->withInput();
        }
        $this->carro->where('id', $idcarro)->update($dadosForm);

        return redirect('carros/index');
    }

    public function getDeletar($idCarro) {

        $carro = $this->carro->find($idCarro);
        $carro->delete();
        return redirect('carros/index');
    }

    public function missingMethod($param = array()) {
        return "erro 404 pagina nao encontrada";
    }

}
