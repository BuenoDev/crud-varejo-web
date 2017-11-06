<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller\Dashboard;

use Varejo\Controller\Controller;


class Home extends Controller{

    public function index(){

        return view('dashboard/home');
    }
}