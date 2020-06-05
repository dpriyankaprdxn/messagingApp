<header>
      <!-- header wrapper start -->
      <div class="wrapper">
        <h1>
          <a href="index.php" title="Home">
            <img src="https://via.placeholder.com/155x37.png" title="logo">
          </a>
        </h1>
        <div class="menu">
          <nav>
            <ul>
              <li>
                <a href="http://localhost/messagingApp/index.php" title="Home" class="active">Home</a>
              </li>
              <li>
              <?php 
                  if(isset($_SESSION["id"])) {
                    echo "<a href='logout.php' title='Logout'>Logout</a>";
                  }
                  else {
                    echo  "<a href='login.php' title='Login'>Login</a>";
                  }
                  ?>
              </li>
              <?php
              echo '<li>';
                if(isset($_SESSION["id"])) {
                    echo "<a href='register.php' title='Add User'>Add Uer</a>";
                  }
              echo '</li>';
              ?>
            </ul>
          </nav>
        </div>
      </div>      
    </header>