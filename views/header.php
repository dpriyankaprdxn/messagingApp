<header>
      <!-- header wrapper start -->
      <div class="wrapper">
        <h1>
          <a href="<?php echo $baseUrl; ?>/index.php" title="Home">
            <img src="https://via.placeholder.com/155x37.png" title="logo">
          </a>
        </h1>
        <div class="menu">
          <nav>
            <ul>
              <li>
                <a href="<?php echo $baseUrl; ?>/index.php" title="Home" class="active">Home</a>
              </li>
              <li>
              <?php 
                  if(isset($_SESSION["id"])) {
                    echo "<a href='".$baseUrl."/views/logout.php' title='Logout'>Logout</a>";
                  }
                  else {
                    echo  "<a href='".$baseUrl."/views/login.php' title='Login'>Login</a>";
                  }
                  ?>
              </li>
              <li>
                <a href='<?php echo $baseUrl; ?>/views/register.php' title='Register'>Register</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>      
    </header>