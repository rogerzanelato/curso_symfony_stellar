<?php

require_once __DIR__ . "/vendor/autoload.php";

use BancoDeTalentos\Teste;
use BancoDeTalentos\Novo\NovaClasse;

$t = new Teste();
$t->olaMundo();

$nc = new NovaClasse();
$nc->OlaFamilia();

echo "<br><br>";


try {
    $mongo = new MongoDB\Driver\Manager('mongodb://root:1234@mongodb:27017');
    $query = new MongoDB\Driver\Query([], ['sort' => [ 'nome' => 1], 'limit' => 5]);

    $rows = $mongo->executeQuery("banco.clientes", $query);    

    foreach ($rows as $row) {

        echo "$row->nome : $row->profissao<br>";

    }
} catch (MongoDB\Driver\Exception\Exception $e) {
   $filename = basename(__FILE__);
   echo "Erro no arquivo $filename. <br>";
   echo "Exception:" . $e->getMessage() . "<br>";
   echo "Arquivo:" . $e->getFile() . "<br>";
   echo "Linha:" . $e->getLine() . "<br>";
}