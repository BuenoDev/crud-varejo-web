<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller\Dashboard;

use Varejo\Controller\Controller;
use Varejo\Services\Request;

class Product extends Controller{

    function __construct(){
        if(!isset($_SESSION['user'])){
            header("Location: /");
        }

        $this->product = new \Varejo\Model\Product;
    }

    public function show(){
        $data = data('produtos');
        $data['info'] = $this->product->select()->all();
        view('layout/app', $data);
    }

    public function create(){
        $data = data('registrar');
        view('layout/app', $data);
    }

    public function edit($params){
        $data = data('registrar');
        $data['info'] =  $this->product->select()->find($params['id']);
        view('layout/app', $data);
    }

    public function insert(){
        $request = new Request;
        if($this->product->insert($request->post())){
            $_SESSION['insert'] = 'Produto cadastrado com sucesso!';
            header("Location: /products");
        }

    }

    public function update($params){
        $request = new Request;
        if($product = $this->product->select('id')->find($params['id'])){
            $this->product->update($request->post(), ['id', '=', $product[0]['id']]);
            header("Location: /products");
        }
       
    }

    public function delete($params){
        if($product = $this->product->select('id')->find($params['id'])){
            $this->product->delete($product[0]['id']);
            header("Location: /products");
        }
       
    }

    public function list(){
        $request = new Request();
        $result = $this->product->select('id', 'name', 'code', 'amount', 'price')->findByField('name', 'LIKE', '%'. $request->post()['name'] . '%');
        echo json_encode($result);
    }
}