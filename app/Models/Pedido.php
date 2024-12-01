<?php

namespace App\Models;

class Pedido extends RModel
{
    protected $table = 'pedidos';
    protected $dates = ['datapedido'];
    protected $fillable = ['datapedido', 'status', 'usuario_id'];

    public function statusDesc(){

        $desc = '';

        switch ($this->status) {
            case 'PEN': $desc = 'PENDENTE'; break;
            case 'APR': $desc = 'APROVADO'; break;
            case 'CAN': $desc = 'CANCELADO'; break;

            default:
                # code...
                break;
        }
        return $desc;


    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'pedido_id','id');
    }

}
