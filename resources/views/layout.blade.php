<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyShop - Ecommerce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    @yield('scriptjs')

</head>
<body>



    <nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5 mb-5">
        <a href="{{route('home')}}" class="navbar-brand">MyShop</a>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav mr-auto">
                <a class="nav-link" href="{{route('home')}}">Home</a>
              
                @if (!\Auth::user())  
                    <a class="nav-link" href="{{route('cadastrar')}}">Cadastrar</a>
                    <a class="nav-link" href="{{route('logar')}}">Entrar</a>
                @else    
                    <a class="nav-link" href="{{route('compra_historico')}}">Minhas Compras</a>
                @endif   
            </div>
        </div>
        <div class="ml-auto">
            
           
            <p id="qtdCarrinho" class="ml-2 badge badge-pill badge-primary">0</p>
            <a href="{{route('ver_carrinho')}}" class="btn btn-sm"><i class="fa fa-shopping-cart"></i></a>
            &nbsp;  &nbsp;<!-- Espaço extra -->
            @if (\Auth::user())
                <a href="{{route('sair')}}">Sair</a>
            @endif
        </div>
    </nav>
    
    

    <div class="container">
        <div class="row">

           @if (\Auth::user())
                <div class="col-12">
                    <p class="text-right">Seja bem vindo(a), {{ \Auth::user()->nome }} </p>
                </div>
            @endif
            

            @if ($message = Session::get('erro'))
                <div class="col-12">
                    <div class="alert alert-danger">  {{$message}} </div>
                </div>
            @endif

            @if ($message = Session::get('ok'))
                <div class="col-12">
                    <div class="alert alert-success">  {{$message}} </div>
                </div>
            @endif

            @yield('conteudo')

        </div>
    </div>


    <script>
        // Ao carregar a página, verifica se há uma quantidade armazenada no localStorage
        var quantidadeCarrinho = localStorage.getItem('quantidadeCarrinho') || 0;
    
        // Atualiza a quantidade de itens no parágrafo
        atualizarQuantidadeCarrinho();
    
        // Função para adicionar um item ao carrinho
        function adicionarItemAoCarrinho() {
            quantidadeCarrinho++;
            atualizarQuantidadeCarrinho();
        }
    
        // Função para remover um item do carrinho
        function removerItemDoCarrinho() {
            if (quantidadeCarrinho > 0) {
                quantidadeCarrinho--;
                atualizarQuantidadeCarrinho();
            }
        }
    
        // Função para atualizar a quantidade de itens no parágrafo e no localStorage
        function atualizarQuantidadeCarrinho() {
            var qtdCarrinho = document.getElementById("qtdCarrinho");
            qtdCarrinho.textContent = quantidadeCarrinho;
            localStorage.setItem('quantidadeCarrinho', quantidadeCarrinho); // Armazena no localStorage
        }
    
        // Adiciona os event listeners aos links de adicionar e remover itens do carrinho
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.adicionar-item').forEach(function(element) {
                element.addEventListener('click', adicionarItemAoCarrinho);
            });
    
            document.querySelectorAll('.remover-item').forEach(function(element) {
                element.addEventListener('click', removerItemDoCarrinho);
            });
        });





        // Adiciona um event listener para a submissão do formulário de finalização de compra
        document.getElementById('consultarEnderecoForm').addEventListener('submit', function(event) {
        // Previne o comportamento padrão de submissão do formulário
        event.preventDefault();
        
        // Zera o contador de itens no carrinho
        document.getElementById('qtdCarrinho').textContent = '0';

        // Limpa o valor armazenado no localStorage
        localStorage.removeItem('quantidadeCarrinho');

        // Obtém o formulário
        var form = document.getElementById('consultarEnderecoForm');
        
        // Submete o formulário manualmente
        form.submit();
        });







    </script>
    
    

</body>
</html>