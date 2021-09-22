<?php

use App\Core\Model;

class Usuario extends Model {

    public $nome;
    public $userLogin;
    public $senha;
    public $ativo;

    // Método que irá listas todos os usuários
    public function listarUsuario() {

        $sql = "SELECT * FROM usuarios";
        $select = Model::getConnect()->prepare($sql);
        $select->execute();

        // Verificando se existe algum registro na tabela
        if( $select->rowCount() > 0 ):
            // fetchAll pq o select irá obter todas as linhas e campos da tabela
            $resultado = $select->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        else:
            // Irá retornar um array vázio caso não encontre nenhum registro
            return [];
        endif;
    }

    public function criarUsuario() {

        $sql = "INSERT INTO usuarios (LOGIN, SENHA, ATIVO, NOME_COMPLETO) VALUES (?, ?, ?, ?)";

        $stmt = Model::getConnect()->prepare($sql);
        $stmt->bindValue(1, $this->userLogin);
        $stmt->bindValue(2, $this->senha);
        $stmt->bindValue(3, $this->ativo);
        $stmt->bindValue(4, $this->nome);

        if( $stmt->execute() ) {
            return 'Cadastrado com sucesso!';
        } else {
            return 'Erro ao cadastrar!';
        }

    }

    // Pegando ID do usuário
    public function findId($id) {

        $sql = "SELECT * FROM usuarios WHERE USUARIO_ID = ?";
        $select = Model::getConnect()->prepare($sql);
        $select->bindValue(1, $id);
        $select->execute();

        // Verificando se existe algum registro
        if( $select->rowCount() > 0 ):
            $resultado = $select->fetch(\PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return [];
        endif;

    }

    // Atualizando dados do usuário
    public function update($id) {
        $sql = "UPDATE usuarios SET LOGIN = ?, SENHA = ?, ATIVO = ?, NOME_COMPLETO = ? WHERE USUARIO_ID = ?";

        $stmt = Model::getConnect()->prepare($sql);
        $stmt->bindValue(1, $this->userLogin);
        $stmt->bindValue(2, $this->senha);
        $stmt->bindValue(3, $this->ativo);
        $stmt->bindValue(4, $this->nome);
        $stmt->bindValue(5, $id);

        if( $stmt->execute() ):
            return 'Atualizado com sucesso!';
        else:
            return 'Erro ao atualizar.';
        endif;
    }

    // Método para campo de pesquisa
    public function pesquisarUsuario($pesquisa) {

        $sql = "SELECT * FROM usuarios WHERE NOME_COMPLETO LIKE ? COLLATE utf8_general_ci";

        $stmt = Model::getConnect()->prepare($sql);
        $stmt->bindValue(1, "%{$pesquisa}%");
        $stmt->execute();

        if( $stmt->rowCount() > 0 ) {
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        } else {
            return [];
        }

    }

    // Exluindo usuário
    public function delete($id) {
        $sql = "DELETE FROM usuarios WHERE USUARIO_ID = ?";

        $stmt = Model::getConnect()->prepare($sql);
        $stmt->bindValue(1, $id);

        if( $stmt->execute() ) {
            return 'Excluido com sucesso!';
        } else {
            return 'Falha ao excluir.';
        }
    }

}