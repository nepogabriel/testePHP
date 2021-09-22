<?php

use App\Core\Controller;
use App\Auth;

class Home extends Controller {
    public function index() {

        $mensagem = array();

        if( isset($_POST['btn-login']) ) {

            // Verificando se o campo email ou senha está vazio
            if( (empty($_POST['userLogin'])) or (empty($_POST['senha'])) ) {
                $mensagem[] = 'O campo e-mail e senha são obrigatórios!';
            } else {
                $userLogin = $_POST['userLogin'];
                $senha = $_POST['senha'];

                // executando método login($usuario, $senha) e passando os parâmetros
                $mensagem[] = Auth::login($userLogin, $senha);
            }
        }

        // Chamando View
        $this->view('home/index', $dados = ['mensagem' => $mensagem]);
    }

    public function logout() {
        // Intanciando método logoout
        Auth::logout();
    }
}