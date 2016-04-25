<h1>formulario Adicionar carros</h1>

@if( count($errors) > 0)
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
@if(isset($carro) )
     <p>{!!Form::open(['url' => "carros/editar/$carro->id"]) !!}</p>
@else
    {!!Form::open(['url' => 'carros/adicionar'])!!}
@endif     
        {!!Form::text('nome', isset($carro->nome) ? $carro->nome : null, ['placeholder' => 'nome do carro'])!!}
        {!!Form::text('placa', isset($carro->placa) ? $carro->placa : null, ['placeholder' => 'placa do carro'])!!}
        <p> {!!Form::submit('Enviar')!!}</p>
{!!Form::close()!!}

