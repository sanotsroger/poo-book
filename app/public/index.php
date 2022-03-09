<?php

use App\ADO\TCriteria;
use App\ADO\TExpression;
use App\ADO\TFilter;

require __DIR__.'/../vendor/autoload.php';

$criteria1 = new TCriteria();
$criteria1->add(new TFilter('age', '>', '18'), TExpression::OR_OPERATOR);
$criteria1->add(new TFilter('age', '<', '32'), TExpression::OR_OPERATOR);
// echo $criteria1->dump();

$criteria2 = new TCriteria();
$criteria2->add(new TFilter('genrer', 'IN', ['M', 'F']), TExpression::OR_OPERATOR);
$criteria2->add(new TFilter('genrer', 'IN', ['male', 'female']), TExpression::OR_OPERATOR);

$criteria = new TCriteria();
$criteria->add($criteria1, TExpression::AND_OPERATOR);
$criteria->add($criteria2, TExpression::AND_OPERATOR);
echo $criteria->dump();
