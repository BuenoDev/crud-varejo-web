<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller\Dashboard;

use Varejo\Controller\Controller;


class Home extends Controller{

    function __construct(){
        if(!isset($_SESSION['user'])){
            header("Location: /");
        }
    }
    
    public function show(){
        $data = data('home');
        view('layout/app', $data); 
    }
}