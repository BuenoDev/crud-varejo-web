<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller;

class Home extends Controller{

    public function index(){

        return view('home');
    }
}