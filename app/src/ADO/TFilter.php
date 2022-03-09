<?php

namespace App\ADO;

class TFilter extends TExpression
{
    private $variable;
    private $operator;
    private $value;

    public function __construct(string $variable, string $operator, $value)
    {
        $this->variable = $variable;
        $this->operator = $operator;
        $this->value = $this->transform($value);
    }

    private function transform($value)
    {
        $result = '';

        if (is_array($value)) {
            $values = [];
            foreach ($value as $val) {
                array_push($values, $this->sanitizeValue($val));
            }
            $result = '('.implode(', ', $values).')';
        } else {
            $result = $this->sanitizeValue($value);
        }

        return $result;
    }

    /**
     * Retorna o valor tratado.
     */
    private function sanitizeValue($value)
    {
        $result = '';
        if (is_null($value)) {
            $result = 'null';
        } elseif (is_integer($value)) {
            $result = (int) $value;
        } elseif (is_bool($value)) {
            $result = $value ? 'TRUE' : 'FALSE';
        } elseif (is_string($value)) {
            $result = "'{$value}'";
        }

        return $result;
    }

    /***
     * metodo dump()
     * Retorna o filtro em forma de expressão
     * @return string
     */
    public function dump(): string
    {
        return "{$this->variable} {$this->operator} {$this->value}";
    }
}
