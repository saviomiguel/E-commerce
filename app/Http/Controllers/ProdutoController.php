<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Pedido;
use App\Services\VendaService;
use App\Models\Endereco;
use App\Models\ItensPedido;


class ProdutoController extends Controller
{
    public function index(Request $request){
        $data = [];
        $listaProdutos = Produto::all();
        $data['lista'] = $listaProdutos;
        return view('home', $data);
    }

    public function adicionarCarrinho($idProduto=0, Request $request){

        $prod = Produto::find($idProduto);

        if($prod){

            $carrinho = session('cart', []);
            array_push($carrinho, $prod);
            session(['cart' => $carrinho]);
        }
        return redirect()->route('home');
    }



    public function verCarrinho(Request $request){

        $carrinho = session('cart', []);
        $data = ['cart' => $carrinho];
        return view('carrinho', $data);
    }


    public function excluirCarrinho($indice, Request $request){

        $carrinho = session('cart', []);
        if(isset($carrinho[$indice])){
            unset($carrinho[$indice]);
        }

        session(['cart' => $carrinho]);
        return redirect()->route('ver_carrinho');
    }


    public function finalizar(Request $request){

        $prods = session('cart', []);
        $enderecoData = $request->only(['nomeCompleto', 'cpea', 'nomeProvincia', 'nomeMunicipio', 'nomeBairro', 'nomeRua', 'numero', 'complemento']);
        $vendaService = new VendaService();
        $result = $vendaService->finalizarVenda($prods, $enderecoData, \Auth::user());

        if ($result['status'] == 'ok') {
            $request->session()->forget('cart');
        }

        $request->session()->flash($result['status'], $result['message']);

        return redirect()->route('ver_carrinho');
    }





    public function historico(){

        $data = [];

        $idusuario = \Auth::user()->id;
        $listaPedido = Pedido::where('usuario_id', $idusuario)
                            ->orderBy('datapedido', 'desc')
                            ->with('endereco')
                            ->get();


        $data['lista'] = $listaPedido;

        return view('compra/historico', $data);
    }


    public function detalhes(Request $request){
        $idpedido = $request->input('idpedido');

        $listaItens = ItensPedido::join("produtos", "produtos.id", "=", "itens_pedidos.produto_id")
                ->where('pedido_id', $idpedido)
                ->get([ 'itens_pedidos.*', 'itens_pedidos.valor as valoritem', 'produtos.*' ]);

        $data = [];
        $data["listaItens"] = $listaItens;
        return view("compra/detalhes", $data);
    }


    public function detalhesEndereco(Request $request){
        $idpedido = $request->input('idpedido');
        $pedido = Pedido::find($idpedido);

        if($pedido && $pedido->endereco){
            // Retornar a visualização completa do endereço
            return view('compra.detalhes_endereco', ['pedido' => $pedido]);
        } else {
            // Se o endereço não for encontrado, retornar uma mensagem de erro
            return "Endereço não encontrado";
        }
    }


}
