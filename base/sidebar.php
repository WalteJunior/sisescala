        <div class="logo-details">
      <i class="bi bi-buildings-fill"></i>
      <span class="logo_name">Petrópolis Ltda</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class="bi bi-table"></i>
          <span class="link_name">Horarios</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Horarios</a></li>
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
            <div class="job"><p><?php echo $_SESSION['UsuarioNome'];?></p></div>
          </div>
          <a href="/sisescala/logout.php"><i class='bx bx-log-out'></i></a>
        </div>
      </li>
    </ul>
