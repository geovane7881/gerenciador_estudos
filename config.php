<?php

define('URL', 'http://estudar.pc/');

$host = 'localhost';
$dbname = 'meu_gerenciador';
$dbuser = 'root';
$dbpass = '';


$dsn = 'mysql:host='.$host.';dbname='.$dbname;

global $pdo;


try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);

} catch(PDOException $e) {
    echo 'erro: '.$e->getMessage();
}
