<h1>formulario Adicionar carros</h1>

<<<<<<< HEAD
@if(isset($carro) )
     <p>{!!Form::open(['url' => "carros/editar/$carro->id"]) !!}</p>
@else
    {!!Form::open(['url' => 'carros/adicionar'])!!}
@endif     
        {!!Form::text('nome', isset($carro->nome) ? $carro->nome : null, ['placeholder' => 'nome do carro'])!!}
        {!!Form::text('placa', isset($carro->placa) ? $carro->placa : null, ['placeholder' => 'placa do carro'])!!}
        <p> {!!Form::submit('Enviar')!!}</p>
     
=======
@if(isset($idCarro))
     <p> o carro modificado pelo id foi {{$idCarro}} </p>
@endif

    {!!Form::open(['url' => 'carros/adicionar'])!!}
    
        {!!Form::text('nome', null, ['placeholder' => 'nome do carro'])!!}
        {!!Form::text('placa', null, ['placeholder' => 'placa do carro'])!!}
        {!!Form::submit('Enviar')!!}
        
>>>>>>> origin/master
{!!Form::close()!!}

