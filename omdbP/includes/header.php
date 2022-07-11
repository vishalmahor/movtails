<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php" style="color:  #fff">Vishal <span style="color: #d4aa11">Mahor</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php" style="color:  #fff">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #fff">
            Playlist
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="public.php">Public</a></li>
            <li><a class="dropdown-item" href="private.php">Private</a></li>
          </ul>
        </li>
      <?php
      if (isset($_SESSION['id'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="logout.php" style="color:  #fff"></a>
        </li>
      <?php
      } else { ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php" style="color:  #fff">My Account</a>
        </li>
      <?php
      }
      ?>
        
      </ul>
    </div>
  </div>
</nav>