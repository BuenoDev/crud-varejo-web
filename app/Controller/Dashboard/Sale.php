<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller\Dashboard;

use Varejo\Controller\Controller;


class Sale extends Controller{

    function __construct(){
        if(!isset($_SESSION['user'])){
            header("Location: /");
        }
    }

    public function show(){
        $data = data('vendas');
        view('layout/app', $data);
    }

    public function sell(){
        $product = new \Varejo\Model\Product;
        $data = data('vender');
        $data['info'] = $product->select('id', 'name', 'code', 'amount', 'price')->all();
        view('layout/app', $data);
    }
}