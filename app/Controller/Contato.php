<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller;

class Contato extends Controller{
    
    public function show(){
        $data['view'] = view('contato');
        
        echo view('contato', $data);
    }
}