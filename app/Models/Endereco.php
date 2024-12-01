<?php

namespace App\Models;


class Endereco extends RModel
{
    protected $table = 'enderecos';
    protected $fillable = ['nomeProvincia', 'nomeMunicipio', 'nomeBairro', 'nomeRua', 'numero', 'complemento', 'nomeCompleto', 'cpea', 'pedido_id'];


    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id','id');
    }
}
