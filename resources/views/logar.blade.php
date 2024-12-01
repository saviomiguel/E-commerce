@extends('layout')
@section('conteudo')
    
    <div class="col-12">
        <h2 class="mb-3">Entrar no Sistema</h2>
        <form action="{{route('logar')}}" method="post">
            @csrf

            <div class="form-group">
                E-mail:
                <input type="text" name="email" class="form-control">
            </div>

            <div class="form-group">
                Senha:
                <input type="password" name="password" class="form-control">
            </div>
            <input type="submit" value="Entrar" class="btn btn-lg btn-primary">

        </form>
    </div>

@endsection