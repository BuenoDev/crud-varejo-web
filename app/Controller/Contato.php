<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller;

class Contato extends Controller{
    
    public function show(){
        // $data['views']['menu'] = view('menu');
        // $data['views']['status-login'] = view('status-login');
        
        return view('contato', $data);
    }
}