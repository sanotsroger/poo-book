<?php

namespace App\ADO;

/**
 * Classe abstrata para gerenciar expressões.
 */
abstract class TExpression
{
    public const AND_OPERATOR = ' AND ';
    public const OR_OPERATOR = ' OR ';

    abstract public function dump(): string;
}
