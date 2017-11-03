<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller;

class Test extends Controller{
    
    public function show(){
        
        return view('layout/app');

    }
}