<div class="w3-container">
    <form id="lista_usuarios" class="w3-margin" action="/users/editar/<?= $data['registros']['USUARIO_ID']; ?>" method="POST">

        <h4>Editar de usuários</h4>

        <!--
        <div style="display: none;">
            <label>Usuário 1</label>
        </div>
        -->

        <div>
            <label>Nome Completo</label>
            <input type="text" name="nome" value="<?= $data['registros']['NOME_COMPLETO']; ?>" class="w3-input w3-block w3-border" required>
        </div>

        <div>
            <label>Login</label>
            <input type="text" name="userLogin" value="<?= $data['registros']['LOGIN']; ?>" class="w3-input w3-block w3-border" required>
        </div>

        <div>
            <label>Senha</label>
            <input type="password" name="senha" value="<?= $data['registros']['SENHA']; ?>" class="w3-input w3-block w3-border" required>
        </div>

        <div>
            <label>Ativo:</label>
            <select name="ativo">
                <option value="S"> Sim </option>
                <option value="N"> Não </option>
            </select>
        </div>

        <!--
        <ul>
            <li id="opt_cadastrar_clientes"><input type="checkbox" checked value="cadastrar_clientes"> <label>Cadastrar clientes</label></li>
            <li id="opt_excluir_clientes"><input type="checkbox" value="excluir_clientes"> <label>Excluir clientes</label></li>
            <li id="opt_mais"><input type="checkbox" value="mais"> <label>E assim sucessivamente</label></li>
        </ul>-->

        <button name="atualizar" class="w3-button w3-theme w3-margin-top w3-margin-bottom">Atualizar</button>
        <button class="w3-button w3-margin-top w3-margin-bottom w3-right w3-red">
            <a href="/users/pesquisar">
                Cancelar
            </a>
        </button>

    </form>

    <?php 
    // Mensagem de erro
    if( isset($data['mensagem']) ) {
        foreach( $data['mensagem'] as $msg ) {
            echo $msg;
        }
    }
    ?>
</div>