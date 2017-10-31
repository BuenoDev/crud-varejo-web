<?php
/** Boot do sistema. */

require_once __DIR__ . '\..\app\autoload.php';

$users = new Varejo\Model\User;

$dados = [
    'name' => 'Joãozinho Pé de Chinelo',
    'email' => 'ze@brunosite.com',
    'password' => sha1('123456'),
    'role' => 'client'
];

$users->update($dados, ['id', '=', '2']);

// $users->insert($dados);
// if($users){
    
// }

