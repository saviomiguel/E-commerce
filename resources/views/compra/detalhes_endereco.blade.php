
@if ($pedido->endereco)
    <h4>Detalhes do Endereço</h4>
    <p><strong>Nome Completo:</strong> {{ $pedido->endereco->nomeCompleto }}</p>
    <p><strong>CPEA:</strong> {{ $pedido->endereco->cpea }}</p>
    <p><strong>Província:</strong> {{ $pedido->endereco->nomeProvincia }}</p>
    <p><strong>Município:</strong> {{ $pedido->endereco->nomeMunicipio }}</p>
    <p><strong>Bairro:</strong> {{ $pedido->endereco->nomeBairro }}</p>
    <p><strong>Rua:</strong> {{ $pedido->endereco->nomeRua }}</p>
    <p><strong>Número:</strong> {{ $pedido->endereco->numero }}</p>
    <p><strong>Complemento:</strong> {{ $pedido->endereco->complemento }}</p>
@else
    <p>Endereço não encontrado para este pedido.</p>
@endif

