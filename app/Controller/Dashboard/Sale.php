<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller\Dashboard;

use Varejo\Controller\Controller;
use Varejo\Services\Request;

class Sale extends Controller{

    function __construct(){
        if(!isset($_SESSION['user'])){
            header("Location: /");
        }
    }

    public function show(){
        $data = data('vendas');
        $this->sale = new \Varejo\Model\Sale;
        $data['info'] =  $this->sale->select()->all();
        view('layout/app', $data);
    }

    public function sell(){
        $product = new \Varejo\Model\Product;
        $data = data('vender');
        $data['info'] = $product->select('id', 'name', 'code', 'amount', 'price')->all();
        view('layout/app', $data);
    }
    public function sale(){
        $this->product = new \Varejo\Model\Product;
        $this->sale = new \Varejo\Model\Sale;
        $request = new Request;
        if($product = $this->product->select()->find($request->post()['id'])){
            $amount= (int)$product[0]['amount'] - (int)$request->post()['amount'];
            $array=['amount'=> $amount];
            $this->product->update($array, ['id', '=', $request->post()['id']]);
        }
        if($product = $this->sale->select()->find($request->post()['id'])){
            $amount= (int)$product[0]['amount'] + (int)$request->post()['amount'];
            $array=['amount'=> $amount];
            $this->sale->update($array, ['id', '=', $request->post()['id']]);
        }else{
            $this->sale->insert($request->post());
        }
        header("Location: /sell");
    }
}