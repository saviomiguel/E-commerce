@extends('layout')
@section('conteudo')
    @foreach ($lista as $prod)
                
        <div class="col-3 mb-3 d-flex align-items-stretch">
            <div class="card">
                <img src="{{$prod->foto}}" alt="" class="card-img-top" height="200px" width="200px">
                <div class="card-body">
                    <h6 class="card-title">{{$prod->nome}} - {{$prod->valor}} Kz</h6>
                    <a href="{{ route('adicionar_carrinho', [ 'idproduto' => $prod->id ]) }}" class="btn btn-sm btn-secondary adicionar-item" >Adicionar Item</a>
                </div>
            </div>
        </div>

    @endforeach
@endsection

