<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller\Dashboard;

use Varejo\Controller\Controller;


class Home extends Controller{

    public function home(){
        session_start();
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['login'] == 'admin' && $_SESSION['user']['senha'] == 'admin'){
                return view('layout/app');
            } 
        }else{
            header("Location: /");
        }
    }
}