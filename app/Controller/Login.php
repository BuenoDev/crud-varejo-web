<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller;

class Login extends Controller{

    public function show(){
        return view('home');
    }
    public function auth(){
        dd($_POST);
    }
}