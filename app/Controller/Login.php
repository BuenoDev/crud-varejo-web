<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller;

class Login extends Controller{

    public function show(){
        session_start();
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['login'] == 'admin' && $_SESSION['user']['senha'] == 'admin'){
                header("Location: /dash");
            } 
        }
        return view('login');
    }
    public function auth(){
        $request= new \Varejo\Services\Request;
        $user['login']= $request->post('login');
        $user['senha']= $request->post('senha');
        if($user['login']=='admin' && $user['senha']=='admin'){
            session_start();
            $_SESSION['user']= $user;
            header("Location: /dash");
        }else{
            header("Location: /");
        }
    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("Location: /");
    }
}