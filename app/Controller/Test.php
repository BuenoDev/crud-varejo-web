<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller;

class Test extends Controller{
    
    public function show(){
        
        return view('layout/app');

    }

    public function dynamic($params){
        $namespace="Varejo\\Model\\User";
        $user = new $namespace;
        $user->insert([
            'name'=> 'fulano'.time(),
            'email'=> time().'@gmail.com',
            'password'=> 'fulanootal'
        ]);
        
    }
}