        <div class="logo-details">
        <img src="assets/logo-transparente.png" alt="Logo da Empresa" class="company-logo">
      <span class="logo_name">Petrópolis Ltda</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="?page=escala">
          <i class="bi bi-table"></i>
          <span class="link_name">Escalas</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Escalas</a></li>
        </ul>
      </li>
      <li>
        <a href="?page=gera">
          <i class="bi bi-table"></i>
          <span class="link_name">Criar escalas</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="?page=gera">Criar escalas</a></li>
        </ul>
      </li>
      <li>
        <a href="?page=lista_func">
          <i class="bi bi-person-badge-fill"></i>
          <span class="link_name">Funcionários</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="?page=lista_func">Funcionários</a></li>
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
        <a href="?page=lista_usu">
          <i class="bi bi-person-fill-gear"></i>
          <span class="link_name">Usuários</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="?page=lista_usu">Usuários</a></li>
        </ul>
      </li>
      <li>
        <div class="profile-details">
          <div class="profile-content">
            <!--<img src="image/profile.jpg" alt="profileImg">-->
          </div>
          <div class="name-job">
            <div class="profile_name"></div>
            <div class="job"><p style="font-size:medium; text-align:center; margin-top:10px;"><?php echo $_SESSION['UsuarioNome'];?></p></div>
          </div>
          <a href="/sisescala/logout.php"><i class='bx bx-log-out'></i></a>
        </div>
      </li>
    </ul>
