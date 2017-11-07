<?php

// $this->input=[
//     "GET"=>[
//         "/" => "Home@index",
//     ]
// ];
$route->get('/', 'Login@show');
$route->get('/test', 'Test@show');
$route->get('/dash', 'Dashboard\Home@home');
$route->get('/logout', 'Login@logout');
$route->get('/vender', 'Dashboard\Vender@show');
$route->get('/vendas', 'Dashboard\Vendas@show');
$route->get('/produtos', 'Dashboard\Produtos@show');
$route->get('/registrar', 'Dashboard\Registrar@show');
// $route->get('/test/{variavel}', 'Test@dinamic');

// $this->input=[
//     "POST"=>[
//         "/login/auth" => "Login@auth",
//     ]
// ];
$route->post('/login/auth', 'Login@auth');
