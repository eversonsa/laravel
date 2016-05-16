@extends('template.template')


@section('content')
<h1>formulario Adicionar carros</h1>

@if( count($errors) > 0)
<div class="alert alert-warning" role="alert">
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
</div>
@endif
@if(isset($carro) )
     <p>{!!Form::open(['url' => "carros/editar/$carro->id", 'files' => true,'class' => 'form width:50%'] ) !!}</p>
@else
    {!!Form::open(['url' => 'carros/adicionar', 'files' => true, 'class' => 'form'] ) !!}
@endif     
        {!! Form::text('nome', isset($carro->nome) ? $carro->nome : null, ['placeholder' => 'nome do carro', 'class' => 'form-control form-group width:50%'] ) !!}
        {!! Form::text('placa', isset($carro->placa) ? $carro->placa : null, ['placeholder' => 'placa do carro', 'class' => 'form-control form-group'] ) !!}  
        {!!Form::select('id_marca', $marcas, isset($carro->id_marca) ? $carro->id_marca : null, ['class' => 'form-control form-group'])!!}
        <p> {!!Form::submit('Enviar', ['class' => 'btn btn-success'])!!}</p>
{!!Form::close()!!}
@endsection
