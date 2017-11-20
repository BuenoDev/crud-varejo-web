<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller;

use Varejo\Model\User;
use Varejo\Services\Conn\Select;

class Login extends Controller{

    public function show(){
        if(isset($_SESSION['user'])){
            header("Location: /dashboard");
        }
        view('login');
    }



    /**
     * Autenticação do sistema
     */
    public function auth(){
        $request= new \Varejo\Services\Request;

        $user = new User;
        $result = $user->select('name', 'email', 'password')->findByField('email', '=', $request->post('login'));
        if(empty($result)){
            $_SESSION['error']['auth'] = 'Usuário inválido';
        }else{
            if($result[0]['password'] ==  $request->post('senha')){
                $_SESSION['user'] = $result[0];
                header("Location: /dashboard");
            }else{
                $_SESSION['error']['auth'] = 'Senha inválida';
            }
        }

        header("Location: /");
    }

    
    public function logout(){
        session_unset();
        session_destroy();
        header("Location: /");
    }
}