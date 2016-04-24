<h1>formulario Adicionar carros</h1>

@if(isset($idCarro))
     <p> o carro modificado pelo id foi {{$idCarro}} </p>
@endif

    {!!Form::open(['url' => 'carros/adicionar'])!!}
    
        {!!Form::text('nome', null, ['placeholder' => 'nome do carro'])!!}
        {!!Form::text('placa', null, ['placeholder' => 'placa do carro'])!!}
        {!!Form::submit('Enviar')!!}
        
{!!Form::close()!!}

