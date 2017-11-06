<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller\Dashboard;

use Varejo\Controller\Controller;


class Home extends Controller{

    public function home(){
        session_start();
        if($_SESSION['user']){
            if($_SESSION['user']['login'] == 'admin'){
                return view('layout/app');
            } 
        }
        

    }
}