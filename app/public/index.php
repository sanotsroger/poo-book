<?php

require __DIR__.'/../vendor/autoload.php';

use App\ADO\TFilter;

$filterGenrer = new TFilter('genrer', 'IN', ['M', 'F']);
echo $filterGenrer->dump().'<br/>';

$filterContract = new TFilter('contract', 'IS NOT', null);
echo $filterContract->dump().'<br/>';
