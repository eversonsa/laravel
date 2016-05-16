<h1>formulario Adicionar cores</h1>



@if(isset($cor) )
     <p>{!!Form::open(['url' => "cor/editar/$cor->id", 'files' => true] ) !!}</p>
@else
    {!!Form::open(['url' => 'cor/adicionar', 'files' => true] ) !!}
@endif     
        {!! Form::text('cor', isset($cor->cor) ? $cor->cor : null, ['placeholder' => 'nome das cores'] ) !!}
        
        <p> {!!Form::submit('Enviar')!!}</p>
{!!Form::close()!!}
