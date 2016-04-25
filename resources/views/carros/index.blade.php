<h1>Bem vindo a listagem</h1>
{{-- Lista os carros --}}
@forelse($carros as $carro)
<<<<<<< HEAD
     <p>Nome => {{$carro->nome}} placa => ({{$carro->placa}}) {!!HTML::link("carros/editar/{$carro->id}", 'Editar')!!}</p>
=======
     <p>Nome => {{$carro->nome}} placa => ({{$carro->placa}})</p>
>>>>>>> origin/master
      

@empty
    <p>Nenhum carro cadastrado</p>
@endforelse

