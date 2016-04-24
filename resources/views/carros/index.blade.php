<h1>Bem vindo a listagem</h1>

@forelse($carros as $carro)
     <p>Nome => {{$carro->nome}}</p>
     <p>Nome => {{$carro->placa}}</p>

@empty
    <p>Nenhum carro cadastrado</p>
@endforelse

