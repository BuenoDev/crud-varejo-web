<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller;

class Test extends Controller{
    
    public function show(){
        $dados = [
            'name' => 'Luiz Fernado',
            'email' => 'sdsd@asdsd.com',
            'password' => '123456',
        ];
        $insert = new \Varejo\Conn\Insert;
        $insert->execute('users', $dados);

    }

    public function dynamic(){
        
    }
}