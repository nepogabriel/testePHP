<?php

namespace App;

use App\Core\Model;

class Auth {

    public static function login($userLogin, $senha) {
        $sql = "SELECT * from usuarios WHERE login = ?";

        $stmt = Model::getConnect()->prepare($sql);
        $stmt->bindValue(1, $userLogin);
        $stmt->execute();

        // Verificando se existe o login informado pelo usuário
        if( $stmt->rowCount() > 0 ) {

            // resultado da Query SELECT(retorna em array)
            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

            // Verificando senha
            if( $senha == $resultado['SENHA'] ) {

                $_SESSION['logado'] = true;
                $_SESSION['userId'] = $resultado['id'];

                header('Location: /users/pesquisar');
            } else {
                return 'Senha inválida!';

            }

        } else {
            return 'Login inválido!';
        }
    }

    public static function logout() {

        // Destruir sessão
        session_destroy();

        header('Location: /home/index');
    }

    public static function checkLogin() {

        // Verificando se o usuário está logado
        if( !isset($_SESSION['logado']) ) {
            header('Location: /home/index');
            die;
        }
    }
}