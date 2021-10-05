    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- PWA -->
    <meta name="apple-mobile-web-app-status-bar" content="#e7e7ff">
    <meta name="theme-color" content="#e7e7ff">
    <link rel="manifest" href="?manifest">
  </head>
  <body>
    <header>
      <?php if ($blog_photo==true) { ?><img class="photo type_profile d-inline-block align-top" src="<?php echo $blog_photo; ?>"><?php } ?>

      <name><?php echo $blog_name; ?></name>
    </header>
    <nav>
      <a href="?">Home</a><?php if ($writers_section==true){echo " - <a href=\"?writers\">Writers</a>";} ?>
      <?php if(isset($_SESSION["login_name"])){
        if(isset($_SESSION["login_pass"])) {
          $username = $_SESSION["login_name"];
          if($_SESSION["theme"]=="light") {
            $theme = "light";
          } elseif($_SESSION["theme"]=="dark") {
            $theme = "dark";
          }
          echo <<<EOT
          <div class="btn-group" style="float: right;">
            <a href="?u=$username">@$username</a>
            <a class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span></a>
            <ul class="dropdown-menu dropdown-menu-$theme">
              <li><a class="dropdown-item" href="?dashboard">Dashboard</a></li>
              <li><a class="dropdown-item" href="?u=$username">Profile</a></li>
              <li style="/*background: red;*/"><a class="dropdown-item" style="/*color: white;*/" href="?logout">Logout</a></li>
            </ul>
          </div>
EOT;
        } else {
          die("u are hacking this website, please stop.");
        }
      } else {
        echo "<a style=\"float: right;\" href=\"?login\">Login</a>";
      } ?> 
    </nav>
    <main>
