<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller;

class Contato extends Controller{
    
    public function show(){
        $data['view'] = view('contato');
        
        return view('layout/dashboard', $data);
    }
}