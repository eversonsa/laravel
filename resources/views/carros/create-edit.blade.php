<h1>formulario Adicionar carros</h1>

@if( count($errors) > 0)
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
@endif
@if(isset($carro) )
     <p>{!!Form::open(['url' => "carros/editar/$carro->id", 'files' => true] ) !!}</p>
@else
    {!!Form::open(['url' => 'carros/adicionar', 'files' => true] ) !!}
@endif     
        {!! Form::text('nome', isset($carro->nome) ? $carro->nome : null, ['placeholder' => 'nome do carro'] ) !!}
        {!! Form::text('placa', isset($carro->placa) ? $carro->placa : null, ['placeholder' => 'placa do carro'] ) !!}
        {!! Form::file('file') !!}
        <p> {!!Form::submit('Enviar')!!}</p>
{!!Form::close()!!}

