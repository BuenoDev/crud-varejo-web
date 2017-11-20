<?php

/** Autenticação */
$route->get('/', 'Login@show');
$route->post('/', 'Login@auth');
$route->get('/logout', 'Login@logout');


/** Home painel */
$route->get('/dashboard', 'Dashboard\Home@show');

/** Vendas */
$route->get('/sell', 'Dashboard\Sale@sell');
$route->get('/sales', 'Dashboard\Sale@show');

/** Usuáios */
$route->get('/users', 'Dashboard\User@show');
$route->post('/user/create', 'Dashboard\User@create');

/** Product */
$route->get('/products', 'Dashboard\Product@show');
$route->get('/product/create', 'Dashboard\Product@create');
$route->post('/product/create', 'Dashboard\Product@insert');
$route->post('/product/list', 'Dashboard\Product@list');
$route->get('/product/edit/{id}', 'Dashboard\Product@edit');
$route->post('/product/update/{id}', 'Dashboard\Product@update');
$route->post('/product/delete/{id}', 'Dashboard\Product@delete');


