<?php

// $this->input=[
//     "GET"=>[
//         "/" => "Home@index",
//     ]
// ];
$route->get('/', 'Login@show');
$route->get('/test', 'Test@show');
$route->get('/dash', 'Dashboard\Home@home');
// $route->get('/test/{variavel}', 'Test@dinamic');

// $this->input=[
//     "POST"=>[
//         "/login/auth" => "Login@auth",
//     ]
// ];
$route->post('/login/auth', 'Login@auth');
