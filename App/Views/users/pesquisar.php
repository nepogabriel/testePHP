<div class="w3-container">
    <div id="lista_usuarios" class="w3-margin">
        <form action="/users/buscarUsuario" method="POST">
          <input name="pesquisar" type="search" class="w3-bar-item w3-input" placeholder="Buscar Usuário...">

          <button name="btn-pesquisar" class="w3-button w3-theme w3-margin-top">Buscar</button>
          
          <button class="w3-button w3-theme w3-margin-top w3-right">
              <a href="/users/cadastrar/">Cadastrar novo usuário</a>
          </button>
        </form>

        <table>
            <thead>
              <tr>
                <th>Nome</td>
                <th>Login</td>
                <th>Ativo</td>
                <th>Opções</td>  
              </tr>
            </thead>

            <tbody>
              <?php foreach($data['registros'] as $usuario): ?>
                <tr>
                  <td><?= $usuario['NOME_COMPLETO']; ?></td>
                  <td><?= $usuario['LOGIN']; ?></td>

                  <?php if( $usuario['ATIVO'] == 'S' ): ?>
                    <td>Sim</td>
                  <?php else: ?>
                    <td>Não</td>
                  <?php endif; ?>

                  <td>

                    <a href="/users/excluir/<?= $usuario['USUARIO_ID']; ?>">
                      <button class="w3-button w3-theme w3-margin-top">
                          <i class="fas fa-user-times"></i>
                      </button>
                    </a>

                    <a href="/users/editar/<?= $usuario['USUARIO_ID']; ?>"> 
                      <button class="w3-button w3-theme w3-margin-top"> 
                        <i class="fas fa-edit"></i>
                      </button>
                    </a>
                      
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php 
    // Mensagem de erro
    if( isset($data['mensagem']) ) {
        foreach( $data['mensagem'] as $msg ) {
            echo $msg;
        }
    }
    ?>

</div>