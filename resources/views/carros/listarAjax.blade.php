@extends('template.template')

@section('content')

<h1> listagem do carro via ajax</h1>



<table class="table table-hover">
    <tr>
        <th>Nome</th>
        <th>Placa</th>
        
    </tr>
</table>
<div class="preloader" style="display: none;">Listando os dados por favor aguarde...</div>
@endsection

@section('scripts')
<script>
    
  $(function(){
        
      $.ajax({
           url: "carros-ajax",
           type: "GET",
           dataType: "JSON",
           beforeSend: iniciaPreloader()
       }).done(function(data){
           finalizaPreloader();
           
           $.each(data,function(key, value){
              $(".table").append("<tr><td>"+value.nome+"</td><td>"+value.placa+"</td></tr>"); 
           });
       }).fail(function(){
           finalizaPreloader();
           
           alert("fail and data");
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



