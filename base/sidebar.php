<?php
// Inicie a sessão para acessar as variáveis de sessão

// Conexão com o banco de dados
$mysqli = new mysqli("localhost", "root", "", "sisescala");

// Verifique se a conexão está OK
if ($mysqli->connect_error) {
    die("Conexão falhou: " . $mysqli->connect_error);
}

// Pegar o ID do usuário da sessão
$id_usuario = $_SESSION['UsuarioID']; // ID do usuário na sessão (da tabela `usuarios`)

// Consultar o banco de dados para pegar o id_func na tabela usuarios
$result = $mysqli->query("SELECT id_func FROM usuarios WHERE id = $id_usuario");

// Verificar se encontrou o id_func
if ($result && $result->num_rows > 0) {
    $info = $result->fetch_assoc(); // Armazena o id_func no array $info
} else {
    // Caso não tenha encontrado o id_func, pode definir um valor padrão ou tratar o erro
    $info['id_func'] = null; // Ou outro tratamento necessário
}
?>

        
        <div class="logo-details">
        <img src="assets/logo-transparente.png" alt="Logo da Empresa" class="company-logo">
          <span class="logo_name">Petrópolis Ltda</span>
        </div>
        <ul class="nav-links">
          <li>
            <a href="?page=view_escala&id_func=<?php echo $info['id_func'] ?>">
              <i class="bi bi-table"></i>
              <span class="link_name">Horários</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="?page=view_escala&id_func=">Horários</a></li>
            </ul>
          </li>

          <li>
            <a href="?page=perfil_func">
              <i class="bi bi-person-badge-fill"></i>
              <span class="link_name">Perfil</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="?page=perfil_func">Perfil</a></li>
            </ul>
          </li>
          <li>
            <a href="?page=lista_sub">
              <i class="bi bi-person-fill-exclamation"></i>
              <span class="link_name">Substituição</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="?page=lista_sub">Substituição</a></li>
            </ul>
          </li>
          <li>
            <div class="profile-details">
              <div class="profile-content">
                <!--<img src="image/profile.jpg" alt="profileImg">-->
              </div>
              <div class="name-job">
                <div class="profile_name"></div>
                <div class="job">
                  <p style="font-size:medium; text-align:center; margin-top:10px;"><?php echo $_SESSION['UsuarioNome']; ?></p>
                </div>
              </div>
              <a href="/sisescala/logout.php"><i class='bx bx-log-out'></i></a>
            </div>
          </li>
        </ul>