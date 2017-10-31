<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller;

class Home extends Controller{
    
    public function show(){
    
        return view('home');
    }
}