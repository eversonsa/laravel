@extends('template.template')

@section('content')

<h1>Bem vindo a listagem {{$carros->total()}}</h1>

<h2>{!!HTML::link('carros/adicionar/', 'Adicionar', ['class' => 'btn btn-success'])!!}</h2>
{{-- Lista os carros --}}

<table class="table table-hover">
    <tr>
    <th>Nome</th>
    <th>Placa</th>
    <td>Ações</td>
    </tr>
    @forelse($carros as $carro)
    <tr>
        <td>{{$carro->nome}}</td>
        <td>{{$carro->placa}}</td>
        <td>{!!HTML::link("carros/editar/{$carro->id}", '', ['class' =>'glyphicon glyphicon-pencil'])!!} | {!!HTML::link("carros/deletar/{$carro->id}",'', ['class' => 'glyphicon glyphicon-trash'])!!}</td>
    </tr>
    @empty
    <p>Nenhum carro cadastrado</p>
    @endforelse
    </table>

    {!! $carros->render() !!}

@endsection

