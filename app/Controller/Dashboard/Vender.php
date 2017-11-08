<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller\Dashboard;

use Varejo\Controller\Controller;


class Vender extends Controller{

    public function show(){
        session_start();
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['login'] == 'admin' && $_SESSION['user']['senha'] == 'admin'){
                $_SESSION['views']['menu']='menu1';
                $_SESSION['css']['menu']='menu';
                $_SESSION['views']['header']='header1';
                $_SESSION['css']['header']='header';
                $_SESSION['views']['dados']='vender';
                $_SESSION['css']['dados']='dados';
                return view('layout/app');
            } 
        }else{
            header("Location: /");
        }
    }
}