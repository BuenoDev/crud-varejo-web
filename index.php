<?php
/** Boot do sistema. */

require_once __DIR__ . '\app\autoload.php';

$conn = new Varejo\Conn\Conn;

var_dump($conn);