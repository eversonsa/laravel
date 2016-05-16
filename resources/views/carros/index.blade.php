@extends('template.template')

@section('content')

<h1>Bem vindo a listagem {{$carros->total()}}</h1>

<h2>{!!HTML::link('carros/adicionar/', 'Adicionar', ['class' => 'btn btn-success'])!!}</h2>
{{-- Lista os carros --}}
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalGestaoCarros">
    Cadastrar Carro via ajax
</button>
<a href="carros/listar-via-ajax" class="btn btn-danger btn-lg" data-toggle="modal" target="_blank">listar via Ajax</a> 
 
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

<!-- Modal -->
<div class="modal fade" id="modalGestaoCarros" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Gestao de carros</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert" style="display: none"></div>
                <div class="alert alert-warning" role="alert" style="display: none"></div>
                
                {!!Form::open(['url' => 'carros/adicionar-via-ajax', 'send' => 'carros/adicionar-via-ajax', 'files' => true, 'class' => 'form'] ) !!}

                {!! Form::text('nome', null, ['placeholder' => 'nome do carro', 'class' => 'form-control form-group width:50%'] ) !!}
                {!! Form::text('placa',  null, ['placeholder' => 'placa do carro', 'class' => 'form-control form-group'] ) !!}  
                {!!Form::select('id_marca', $marcas, isset($carro->id_marca) ? $carro->id_marca : null, ['class' => 'form-control form-group'])!!}
                <div class="preloader" style="display: none">Enviando os dados</div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                {!!Form::submit('Enviar', ['class' => 'btn btn-success'])!!}
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>
    $(function(){
        
        $("form.form").submit(function(){
        
            var dadosFormulario = $(this).serialize();
            
            $.ajax({
                url: $(this).attr("send"),
                data: dadosFormulario,
                type: "POST",
                beforeSend: iniciaPreloader()            
            }).done(function(data){
                
                finalizaPreloader();
                
                if(data == "1"){
                    location.reload();
                }else{
                   $(".alert-warning").html(data);
                   $(".alert-warning").show();
                }
                
            }).fail(function(){
                finalizaPreloader();
                
                alert("falha ao enviar dados");
            });
            
            return false;
            
        });
    
    });
    
    function iniciaPreloader(){
       $(".preloader").show();   
    }
    
    function finalizaPreloader(){
        $(".preloader").hide();
    }
 </script>
@endsection

