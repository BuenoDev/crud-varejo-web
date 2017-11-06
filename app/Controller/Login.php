<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller;

class Login extends Controller{

    public function show(){
        return view('login');
    }
    public function auth(){
        $request= new \Varejo\Services\Request;
        $user['login']= $request->post('login');
        $user['senha']= $request->post('senha');

        if($user['login']=='admin' && $user['senha']=='admin'){
            header("Location: /dash");
        }else{
            header("Location: /");
        }
    }
}