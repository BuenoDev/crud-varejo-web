<?php

namespace Varejo\Services;

class RenderView{
    private $view;
    private $data;
    private $content;

    /**
     * Execução de renderização de view para distribuição de dados
     * informados pelo Controller
     * @param string $view
     * @param array $data
     */
    public function render($view, array $data){
        $this->view = (string) $view;
        $this->data = $data;
    }

    /**
     * Carregar view e armazenar o conteúdo em formato de string 
     * para receber o tratamento e troca de dados
     */
    private function loadView(){
        $view = \ROOT_PATH . \_DS_ . 'resources' . \_DS_ . 'views' . \_DS_ . $this->view . '.view.php';
        if(\file_exists($view)){
            $this->content = file_get_contents($view);
        }
    }

    public function travel(){
        $pattern = "/@extends\([a-z]{?}\)/";
        $extenders = preg_match($pattern, 'ada dfg dfg nsd@extends("view") asdtudo @extends("sdas")  ', $string, PREG_OFFSET_CAPTURE, 3);

        // \dd($string);
    }

    private function change(){

    }
}