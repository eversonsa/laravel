<h1>Bem vindo a listagem das marcas</h1>
<h2>{!!HTML::link('marca/adicionar/', 'Adicionar')!!}</h2>
{{-- Lista as cores dos carros --}}

@forelse($marcaCarro as $marcas)

     <p>Marca do Carro => {{$marcas->marca}} </p>
@empty
    <p>Nenhuma marca cadastrado</p>
@endforelse