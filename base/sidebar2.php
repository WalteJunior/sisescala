        <div class="logo-details">
      <i class="bi bi-buildings-fill"></i>
      <span class="logo_name">Petrópolis Ltda</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="?page=escala">
          <i class="bi bi-table"></i>
          <span class="link_name">Escalas</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="?page=escala">Escalas</a></li>
        </ul>
      </li>
      
      <li>
        <a href="?page=lista_func">
          <i class="bi bi-person-badge-fill"></i>
          <span class="link_name">Funcionarios</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="?page=lista_func">Funcionarios</a></li>
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
            <div class="job"><p><?php echo $_SESSION['UsuarioNome'];?></p></div>
          </div>
          <a href="/sisescala/logout.php"><i class='bx bx-log-out'></i></a>
        </div>
      </li>
    </ul>
