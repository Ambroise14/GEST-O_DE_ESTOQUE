<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'add-tocart','deletecart','updatecart','alterarprecoproduto','updateprecoproduto','excluirproduto',
        'alterarquantidadeproduto','updatequantidadeproduto','venda','order_details','alterarnomeproduto','updatenomeproduto','relatoriointerval'
    ];
}
