<?php

namespace App\Services;

use App\Models\User;
use App\Models\Pedido;
use App\Models\ItensPedido;
use App\Models\Endereco;

class VendaService{

    public function finalizarVenda($prods = [], $enderecoData = [], User $usuario){

        try {

            \DB::beginTransaction();
            $dtHoje = now();
            $pedido = new Pedido;

            $pedido->datapedido = $dtHoje;
            $pedido->status ='PEN';
            $pedido->usuario_id = $usuario->id;
            $pedido->save();

            foreach ($prods as $p) {
                $itens = new ItensPedido;
                $itens->quantidade = 1;
                $itens->valor = $p->valor;
                $itens->dt_item = $dtHoje;
                $itens->produto_id = $p->id;
                $itens->pedido_id = $pedido->id;
                $itens->save();
            }

            // Agora que o pedido foi salvo, podemos associá-lo ao endereço
            $endereco = new Endereco;
            $endereco->fill($enderecoData);
            $endereco->pedido_id = $pedido->id; // Associar o endereço ao pedido
            //dd( $endereco);
            $endereco->save();


            \DB::commit();
            return ['status' => 'ok', 'message' => 'Venda finalizada com sucesso'];
        } catch (\Exception $e) {
            \DB::rollback();
            return ['status' => 'erro', 'message' => 'Venda não pode ser finalizada'];
        }

    }





}
