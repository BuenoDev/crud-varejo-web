<?php
/** Boot do sistema. */
require_once __DIR__ . '\..\app\autoload.php';


$dados = [
    'name' => 'Joãozinho Pé de Chinelo',
    'email' => 'ze@brunosite.com',
    'password' => sha1('123456'),
    'role' => 'client'
];


dd($dados);


// $users = new Varejo\Model\User;
// $users->insert($dados);
// if($users){
    
// }