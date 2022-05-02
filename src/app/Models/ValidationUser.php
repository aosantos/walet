<?php
namespace App\Models;

class ValidationUser
{
    const RULE_USER = [
        'nome_completo' => 'required|min:3',
        'cpf' => 'required|numeric',
        'email' => 'required|email',
        'senha' => 'required|numeric',
        'carteira' => 'required|numeric'
    ];
}
