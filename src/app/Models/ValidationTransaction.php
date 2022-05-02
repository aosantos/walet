<?php
namespace App\Models;

class ValidationTransaction
{
    const RULE_TRANSACTION = [
        'value' => 'required|numeric',
        'payer' => 'required|numeric',
        'payee' => 'required|numeric'
    ];
}
