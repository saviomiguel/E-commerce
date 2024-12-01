@extends('layout')
@section('conteudo')

    @if (isset($cart) && count($cart) > 0)

        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Foto</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0;  @endphp
                @foreach ($cart as $indice => $p)
                    <tr>
                        <td>
                            <a href="{{route('carrinho_excluir', ['indice' => $indice ])}}" class="btn btn-danger btn-sm remover-item">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                        <td>{{ $p->nome }}</td>
                        <td><img src="{{ $p->foto }}" alt="" height="50"></td>
                        <td>{{ $p->valor }}</td>
                        <td>{{ $p->descricao }}</td>
                    </tr>
                @php $total += $p->valor;  @endphp
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <td class="colspan=5">
                        Total do carrinho: Kz {{$total}}
                    </td>
                </tr>
            </tfoot>


        </table>

        <div class="col-12">
            <h2 class="mb-3">Onde queres e quem receberá a compra?</h2>
        </div>

        <form action="{{route('carrinho_finalizar')}}" method="post" id="consultarEnderecoForm">
            @csrf
            <div class="row">

                    <div class="col-6">
                        <div class="form-group">
                            CPEA: <input type="text" id="cpea" name="cpea" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            Nome completo: <input type="text" id="nomeCompleto" name="nomeCompleto" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            Província: <input type="text" name="nomeProvincia" id="nomeProvincia" class="form-control">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            Município: <input type="text" name="nomeMunicipio" id="nomeMunicipio" class="form-control">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            Bairro: <input type="text" name="nomeBairro" id="nomeBairro" class="form-control">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            Rua: <input type="text"  name="nomeRua" id="nomeRua" class="form-control">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            Número/Nome <input type="text" name="numero" id="numero" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            Complemeto (opcional): <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Ex: condominio vila flor">
                        </div>
                    </div>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="{{ asset('assets/js/consumir.js') }}"></script>

            </div>
                <input type="submit" value="Finalizar compra" class="btn btn-sm btn-success">

        </form>
        <br>
        <br>

    @else
        <p>Nenhum item no carrinho</p>
    @endif

@endsection
