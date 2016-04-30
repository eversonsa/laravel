<h1>Bem vindo a listagem </h1>
<h2>{!!HTML::link('cor/adicionar/', 'Adicionar')!!}</h2>
{{-- Lista as cores dos carros --}}

@forelse($cor as $cores)

     <p>Cor do Carro => {{$cores->cor}} </p>
@empty
    <p>Nenhuma cor cadastrado</p>
@endforelse

