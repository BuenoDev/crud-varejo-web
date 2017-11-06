<?php

// $this->input=[
//     "GET"=>[
//         "/" => "Home@index",
//     ]
// ];
$route->get('/', 'Home@index');
$route->get('/test', 'Test@show');
$route->get('/bruno/test', 'Dashboard\Home@index');
// $route->get('/test/{variavel}', 'Test@dinamic');

// $this->input=[
//     "POST"=>[
//         "/login/auth" => "Login@auth",
//     ]
// ];
$route->post('/login/auth', 'Login@auth');
