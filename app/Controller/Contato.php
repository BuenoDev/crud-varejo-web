<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller;

class Contato extends Controller{
    
    public function show(){
        $data['title'] = "Minha página de contato";
        $data['valor'] = $this->get()['controller'];

        return view('', $data);
    }
}