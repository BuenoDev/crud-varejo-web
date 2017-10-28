<?php
/** Boot do sistema. */

require_once __DIR__ . '\..\app\autoload.php';


$dados = [
    'name' => 'Joãozinho Pé de Chinelo',
    'email' => 'joao@brunosite.com',
    'password' => sha1('123456'),
    'role' => 'client'
];

$users = new Varejo\Model\User;
$users->insert($dados);
