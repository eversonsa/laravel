<h1>Bem vindo a listagem {{$carros->total()}}</h1>
<h2>{!!HTML::link('carros/adicionar/', 'Adicionar')!!}</h2>
{{-- Lista os carros --}}

@forelse($carros as $carro)

     <p>Nome => {{$carro->nome}} placa => ({{$carro->placa}}) marca => ({{$carro->marca}}){!!HTML::link("carros/editar/{$carro->id}", 'Editar')!!} |{!!HTML::link("carros/deletar/{$carro->id}", 'Deletar')!!}</p>
@empty
    <p>Nenhum carro cadastrado</p>
@endforelse

{!! $carros->render() !!}

