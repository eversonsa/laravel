<h1>Bem vindo a listagem</h1>
{{-- Lista os carros --}}
@forelse($carros as $carro)
     <p>Nome => {{$carro->nome}} placa => ({{$carro->placa}})</p>
      

@empty
    <p>Nenhum carro cadastrado</p>
@endforelse

