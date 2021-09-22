<?php

namespace App\Core;

class App {

    protected $controller = 'home';
    protected $method = 'index';
    protected $parameter = [];

    public function __construct() {
        // print_r( $url = $this->parseURL() );
        $url = $this->parseURL();

        // Verificando se existe um controller com o mesmo nome do indice 1 da url
        if( file_exists('../App/Controllers/' . $url[1] . '.php') ) {
            $this->controller = $url[1];
            unset($url[1]);
        }

        // chamando o controller atualizado (arquivo referente ao 1 parâmetro da url)
        require_once '../App/Controllers/' . $this->controller . '.php';
        // Atributo controller agora é um objeto(class)
        $this->controller = new $this->controller;

        // Verificando de existe o parâmetro 2 da url
        if( isset($url[2]) ) {
            // Verificando se existe o método(function) dentro do Objeto(controller/class)
            if( method_exists($this->controller, $url[2]) ) {
                $this->method = $url[2];
                unset($url[2]);
                unset($url[0]);
            }
        }

        // Se a URL tiver valores(parâmetros) irá atribuir ao atributo $this->parameter, caso não exista ele continuará vazio
        $this->parameter = $url ? array_values($url) : [];

        // Executando método que está dentro do controller p/ acessar url
        call_user_func_array([$this->controller, $this->method], $this->parameter);

    }

    public function parseURL() {
        //$SERVER_URI['SERVER_NAME'] - host
        // $SERVER_URI['REQUEST_URI'] - página atual
        // explode('/', ...) - para separar a url
        // filter_var(..., FILTER_SANITIZE_URL) - filtrar url escreita pelo usuário
        return explode( '/', filter_var($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) );
    }
}