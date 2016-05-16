<h1>formulario Adicionar Marcas</h1>



@if(isset($marcaCarro) )
     <p>{!!Form::open(['url' => "marca/editar/$cor->id", 'files' => true] ) !!}</p>
@else
    {!!Form::open(['url' => 'marca/adicionar', 'files' => true] ) !!}
@endif     
        {!! Form::text('marca', isset($marca->cor) ? $marca->cor : null, ['placeholder' => 'nome das marcas'] ) !!}
        
        <p> {!!Form::submit('Enviar')!!}</p>
{!!Form::close()!!}

