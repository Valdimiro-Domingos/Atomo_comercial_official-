<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function itens()
    {
        return $this->hasMany(ItemPedido::class);
    }
}
