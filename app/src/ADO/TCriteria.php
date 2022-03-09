<?php

namespace App\ADO;

class TCriteria extends TExpression
{
    private $expressions = [];
    private $operators = [];
    private $properties;

    public function __construct()
    {
    }

    public function add(TExpression $expression, $operator = self::AND_OPERATOR)
    {
        if (empty($this->expressions)) {
            $operator = null;
        }
        array_push($this->expressions, $expression);
        array_push($this->operators, $operator);
    }

    public function dump(): string
    {
        $result = '';

        if (is_array($this->expressions)) {
            if (count($this->expressions)) {
                foreach ($this->expressions as $i => $expression) {
                    $operator = $this->operators[$i];
                    $result .= $operator.$expression->dump().' ';
                }
                $result = '('.trim($result).')';
            }
        }

        return $result;
    }

    public function setProperty($property, $value)
    {
        if (isset($value)) {
            $this->properties[$property] = $value;
        } else {
            $this->properties[$property] = null;
        }
    }

    public function getProperty($property)
    {
        if (isset($this->properties[$property])) {
            return $this->properties[$property];
        }
    }
}
