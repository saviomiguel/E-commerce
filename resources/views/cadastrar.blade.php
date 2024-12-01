@extends('layout')
@section('scriptjs')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function(){
        $('#login').mask('000.000.000-00')
        $('#cep').mask('00000-000')
    })
</script>
@endsection
@section('conteudo')
    
    <div class="col-12">
        <h2 class="mb-3">Cadastrar clientes</h2>
    </div>
    <div class="col-12">
        <form action="{{route('cadastrar_cliente')}}" method="POST">
            @csrf
            
                
                    <div class="form-group">
                        Nome: <input type="text" name="nome" id="" class="form-control">
                    </div>
                

                
                    <div class="form-group">
                        E-mail: <input type="email" name="email" id="" class="form-control">
                    </div>
                
                    
                
                    <div class="form-group">
                        Senha: <input type="password" name="password" id="" class="form-control">
                    </div>
                
                    <input type="submit" value="Cadastrar" class="btn btn-success btn-lg">
                    
        </form>
    </div>
@endsection