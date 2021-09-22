<?php

namespace App\Core;

// Controller base - todos os controllers irão herdar os atributos e métodos do controller Base
class Controller {

    public function model($model) {
        // quando o método for instanciado irá carregar o model
        require_once '../App/Models/' . $model . '.php';
        return new $model;
    }

    public function view($view, $data = []) {
        // chamando o template, pois a view será chamada dentro do template
        require_once '../App/Views/template.php';
    }
}