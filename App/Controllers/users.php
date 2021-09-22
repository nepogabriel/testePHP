<?php

use App\Core\Controller;
use App\Auth;

class Users extends Controller {

    public function index() {
        // Verificando se usuário tem permissão p/ acessar páginas restristas
        Auth::checkLogin();
    }

    public function cadastrar() {
        Auth::checkLogin();

        $mensagem = array();

        if( isset($_POST['btn-cadastrar']) ) {
            $nome = $_POST['nome'];
            $userLogin = $_POST['userLogin'];
            $senha = $_POST['senha'];
            $ativo = $_POST['ativo'];

            $usuario = $this->model('Usuario');
            // Passando $_POST para os atributos da Class Usuario
            $usuario->nome = $nome;
            $usuario->userLogin = $userLogin;
            $usuario->senha = $senha;
            $usuario->ativo = $ativo;

            $mensagem[] = $usuario->criarUsuario();
        }

        // Chamando View
        $this->view('users/cadastrar', $dados = ['mensagem' => $mensagem]);
    }

    public function editar($id = '') {
        Auth::checkLogin();

        $mensagem = array();

        $usuario = $this->model('Usuario');

        if( isset($_POST['atualizar']) ) {
            // atribundo $_POST aos atributos que estão em Models/Usuarios.php
            $usuario->nome = $_POST['nome'];
            $usuario->userLogin = $_POST['userLogin'];
            $usuario->senha = $_POST['senha'];
            $usuario->ativo = $_POST['ativo'];

            // Mensagem de sucesso e erro
            $mensagem[] = $usuario->update($id);
        }
        
        $dados = $usuario->findId($id);

        $this->view('users/editar', $dados = ['mensagem' => $mensagem, 'registros' => $dados]);
    }

    public function pesquisar() {
        Auth::checkLogin();

       $usuario = $this->model('Usuario');

       // Resultado do select no BD
       $dados = $usuario->listarUsuario();

        // Chamando View
        $this->view('users/pesquisar', $dados = ['registros' => $dados]);
    }

    // Método para campo de pesquisa
    public function buscarUsuario() {
        Auth::checkLogin();

        // if( isset($_POST['btn-pesquisar']) ) {
        //     $pesquisa = $_POST['pesquisar'];
        // } else {
        //     $pesquisa = $_SESSION['pesquisa'];
        // }

        $pesquisa = isset($_POST['btn-pesquisar']) ? $_POST['pesquisar'] : $_SESSION['pesquisa'];
        $_SESSION['pesquisa'] = $pesquisa;

        $usuario = $this->model('Usuario');
        $dados = $usuario->pesquisarUsuario($pesquisa);

        // Chamando View
        $this->view('users/pesquisar', $dados = ['registros' => $dados]);
    }

    // Exluindo usuário
    public function excluir($id) {
        $mensagem = array();

        $usuario = $this->model('Usuario');

        $mensagem[] = $usuario->delete($id);

        // Listar todos os usuários após exluir um usuário
        $dados = $usuario->listarUsuario();

        $this->view('users/pesquisar', $dados = ['registros' => $dados, 'mensagem' => $mensagem]);
    }
}