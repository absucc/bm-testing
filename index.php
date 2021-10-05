<?php
$this_file = str_replace("/", "", $_SERVER["PHP_SELF"]);
$path = "bm-".$this_file."/";
include $path."settings.php";
if ($blog_photo==false) {
  $final_blog_photo = $path."imgs/bmicon72.png";
} else {
  $final_blog_photo = $blog_photo;
}
$invalid_theme = <<<"EOT"
<!DOCTYPE html>
<html>
  <body>
    <h1>Error, no theme found, please, put a correct one: <a href="?theme=light">Light</a> - <a href="?theme=dark">Dark</a></h1>
  </body>
</html>
EOT;
session_start();
if(isset($_GET["theme"])) {
  if($_GET['theme'] == false) {
    die($invalid_theme);
  } else {
    $_SESSION["theme"] = $_GET["theme"];
  }
}
if(isset($_SESSION["theme"])) {
  $theme = $_SESSION["theme"];
} else {
  $theme = $default_theme;
  $_SESSION["theme"] = $theme;
}
if(isset($_GET["p"])) {
  include $path."startvisualcore.php";
  if (file_exists($path."data/posts/".$_GET["p"].".php")) {
    include $path."data/posts/".$_GET["p"].".php";
    include $path."themes/".$theme_pack."/header.php";
    if ($author == false) {} else {
      include $path."data/users/".$author.".php";
      if ($author_name == false) {
        $author_name = "@".$author;
      }
      if ($author_photo == false) {
        $author_photo = $path."imgs/profile-photo.png";
      }
    }
    include $path."story_replacer.php";
?>
      <div class="art_content">
        <!--<div style="display: flex;">
          <h3 class="pubBack" style="margin: 10;"><a href="<?php echo $_SERVER['PHP_SELF']; ?>"><i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i></a></h3> -->
          <div style="display: block;">
              <?php if (isset($_GET["edit"])) {
                  if(isset($_SESSION["login_name"])) {
                    if(isset($_SESSION["login_pass"])) {
                      if($_SESSION["login_name"] == $author || $owner) { ?>
            <article><form method="POST">
              <h1 id="title"><input name="title" value="<?php echo $title; ?>"></h1>
              <p>by <?php if ($author == false) {echo "Anonymous";} else { ?><a href="<?php echo '?u='.$author; ?>"><?php echo $author_name ?> <img src="<?php echo $author_photo; ?>" class="ri size-0 circular" alt="<?php echo $author.'\'s profile photo'; ?>"></a><?php } ?> <date><?php echo $date ?></date></p>
              <hr>
              <p><input name="prestory" value="<?php echo $prestory; ?>"></p>
              <hr>
              <div id="story">
                <textarea name="story" rows="4" cols="50"><?php echo $story ?></textarea>
              </div>
              <button name="submited" type="submit" class="save-btn">Save</button>
            </form>
            <a href="?p=<?php echo $_GET['p'] ?>"><button class="cancel-btn">Cancel</button></a>
            </article>
<?php                   if (isset($_POST["submited"])) {
                          $file = fopen($path."data/posts/".$_GET["p"].".php", "w");
                          $newfile = '<?php
// Config
$author = '.$author.';
$title = "'.$_POST["title"].'";
$description = "'.$_POST["description"].'";
$date = "'.$date.'";
$prestory = "'.$_POST["prestory"].'";
$story = <<<\'EOT\'
'.$_POST["story"].'
EOT;
?>';
                          fwrite($file, $newfile);
                          fclose($file);
                          echo '<meta http-equiv="refresh" content="0;url=?p='.$_GET["p"].'">';
                        }
                      } else {
                        echo "ACCESS NOT GRANTED";
                      }
                    }
                  } else {
                    header("Location: ?login&redirect=%3Fp%3D".$_GET["p"]."%26edit");
                  } 
              } else { ?>
            <article>
              <h1 id="title"><?php echo $title; ?></h1>
              <p>by <?php if ($author == false) {echo "Anonymous";} else { ?><a href="<?php echo '?u='.$author; ?>"><?php echo $author_name ?> <img src="<?php echo $author_photo; ?>" class="ri size-0 circular" alt="<?php echo $author.'\'s profile photo'; ?>"></a><?php } ?> <date><?php echo $date ?></date></p>
              <hr>
              <div id="story">
                <?php echo $final_story ?>
                
              </div>
              <?php if(isset($_SESSION["login_name"])){
                if(isset($_SESSION["login_pass"])) {
                  if($_SESSION["login_name"] == $author or $owner) { ?>
                  <div><br><a href="?p=<?php echo $_GET['p'] ?>&edit"><button>EDIT</button></a></div>
                <?php }
                }
              } ?>
            </article>
            <article style="text-align: center;">
              <div class="likely">
                <p>Share:</p>
                <div class="facebook"></div>
                <div class="twitter"></div>
                <div class="vkontakte"></div>
                <div class="telegram"></div>
                <div class="reddit"></div>
              </div>
            </article>
          </div>
          <?php } ?>
        <!-- </div> -->
<?php
    include $path."themes/".$theme_pack."/footer.php";
  } else {
    echo "<center><br><h1 style=\"color:white\">Post not found</h1></center>";
  }
} elseif(isset($_GET["u"])) {
  include $path."startvisualcore.php";
  include $path."themes/".$theme_pack."/header.php";
  /* $id = $_GET["p"];
  function purifier() {
    $includer = include $_GET['p'].".php";
    $purifier_one = str_replace("\n", "<br>", $includer);
    return
  } */
  if(file_exists($path."data/users/".$_GET["u"].".php")){
  include $path."data/users/".$_GET["u"].".php";
  if ($author_name == false) {
    $uname = "@".$_GET["u"];
  } else {
    $uname = $author_name;
  }
  if ($author_photo == false) {
    $author_photo = $path."imgs/profile-photo.png";
  } ?>
      <div class="art_content">
        <!-- <div style="display: flex;">
          <h3 class="pubBack" style="margin: 10;"><a href="<?php echo $_SERVER['PHP_SELF']; ?>"><i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i></a></h3> -->
          <div style="display: block;">
            <article>
              <div style="display: flex">
                <h2 style="float: left">
                  <img class="photo type_profile" src="<?php echo $author_photo; ?>"> About <b><?php echo $uname." "; ?><?php if($_SESSION["login_name"]==$owner) { ?><span style="align-self: center; font-size: small;" class="badge bg-warning text-dark">Owner</span><?php } ?></b>
                </h2>
                <!-- <button style="float: right">EDIT</button> -->
              </div>
              <hr>
              <p>
                <?php if (isset($_GET["edit"])) {
                  if(isset($_SESSION["login_name"])) {
                    if(isset($_SESSION["login_pass"])) {
                      if($_SESSION["login_name"] == $_GET["u"]) {
                        if (isset($_POST["submited"])) {
                          $file = fopen($path."data/users/".$_GET["u"].".php", "w");
                          $newfile = '<?php
$author_name = "'.$_POST["name"].'";
$author_photo = false;
$author_description = "'.$_POST["description"].'";
$author_website = "'.$_POST["website"].'";

// Social Media
$author_twitter = "'.$_POST["twitter"].'";
$author_instagram = "'.$_POST["instagram"].'";
$author_reddit = "'.$_POST["reddit"].'";
$author_telegram = "'.$_POST["telegram"].'";

$password = \''.password_hash($_SESSION["login_pass"], PASSWORD_BCRYPT).'\';
?>';
                          fwrite($file, $newfile);
                          fclose($file);
                          echo '<meta http-equiv="refresh" content="0;url=?u='.$_GET["u"].'">';
                        } else { ?>
                <form method="POST">
                  <p>
                    <label for="name"><b>Name:</b></label>
                    <input type="text" name="name" value="<?php echo $author_name ?>"><br>
                    <label style="self-align: center;" for="description"><b>Description:</b></label>
                    <input type="text" name="description" value="<?php echo $author_description ?>"><br>
                    <label for="username"><b>Username:</b></label>
                    <span>Username can't be changed</span><br>
                    <label><b>Twitter:</b></label>
                    @<input type="text" name="twitter" value="<?php echo $author_twitter ?>"><br>
                    <label><b>Instagram:</b></label>
                    @<input type="text" name="instagram" value="<?php echo $author_instagram ?>"><br>
                    <label><b>Reddit:</b></label>
                    u/<input type="text" name="reddit" value="<?php echo $author_reddit ?>"><br>
                    <label><b>Telegram:</b></label>
                    @<input type="text" name="telegram" value="<?php echo $author_telegram ?>"><br>
                    <label><b>Website:</b></label>
                    <input type="text" name="website" value="<?php echo $author_website ?>"><br>
                  </p>
                  <button type="submit" name="submited" class="save-btn">Save</button>
                </form>
                <a href="?u=<?php echo $_GET["u"] ?>" class="cancel-btn"><button>Cancel</button></a>
                      <?php }
                      }
                    }
                  }
                } else { ?>
                <?php if($author_name == false) {} else { echo "<b>Name:</b> ".$author_name."<br>\n"; } ?>
                <?php if ($author_description == false) {} else { echo "<b>Description:</b> ".$author_description."<br>\n"; } ?>
                <b>Username:</b> @<?php echo $_GET["u"] ?><br><?php echo "\n" ?>
                <?php
                if($author_twitter == false) {} else {
                  if ($nitter==true) {
                    $tw_url = $nitter_instance;
                  } else if($nitter==false) {
                    $tw_url = "https://twitter.com";
                  }
                  echo "<b>Twitter:</b> <a href=".$tw_url."/".$author_twitter.">@".$author_twitter."</a><br>\n";
                } ?>
                <?php
                if($author_instagram == false) {} else {
                  if ($bibliogram==true) {
                    $ig_url = $bibliogram_instance;
                  } else if($bibliogram==false) {
                    $ig_url = "https://instagram.com";
                  }
                  echo "<b>Instagram:</b> <a href=".$ig_url."/".$author_instagram.">@".$author_instagram."</a><br>\n";
                } ?>
                <?php
                if($author_reddit == false) {} else {
                  if ($teddit==false) {
                    if ($libreddit==false) {
                      if($kddit==false) {
                        echo "<b>Reddit:</b> <a href=\"https://reddit.com/u/".$author_reddit."\">u/".$author_reddit."</a><br>\n";
                      } else {
                        echo "<b>Reddit:</b> <a href=\"https://kddit.kalli.st/u/".$author_reddit."\">u/".$author_reddit."</a><br>\n";
                      }
                    } else {
                      echo "<b>Reddit:</b> <a href=\"".$libreddit_instance."/u/".$author_reddit."\">u/".$author_reddit."</a><br>\n";
                    }
                  } else {
                    echo "<b>Reddit:</b> <a href=\"https://teddit.net/u/".$author_reddit."\">u/".$author_reddit."</a><br>\n";
                  }
                } ?>
                <?php if($author_telegram == false) {} else { echo "<b>Telegram:</b> <a href=https://t.me/".$author_telegram.">@".$author_telegram."</a><br>\n"; } ?>
                <?php if($author_website == false) {} else { echo "<b>Website:</b> <a href=".$author_website.">".$author_website."</a>\n"; } ?>
              </p>
              <?php if(isset($_SESSION["login_name"])){
                if(isset($_SESSION["login_pass"])) {
                  if($_SESSION["login_name"]==$_GET["u"]) { ?>
                  <div><a href="?u=<?php echo $_GET['u'] ?>&edit"><button>EDIT</button></a></div>
            <?php }
                }
              }
            } ?>
            </article>
          </div>
        <!-- </div> -->
<?php
    include $path."themes/".$theme_pack."/footer.php";
  } else {
    echo "      <center><br><h1 style=\"color:white\">User not found</h1></center>";
  }
} elseif(isset($_GET["writers"])) {
  include $path."startvisualcore.php";
  include $path."themes/".$theme_pack."/header.php";
  if ($writers_section==false) {
    echo "      <br>\n      <center><h1 style=\"color: white;\">The writers section was disabled</h1></center>";
  } else {
    echo "      <div class=\"art_content\">\n        <h1 style=\"color: white; margin: 10px 3.5%;\">Writers</h1>\n";
    foreach (glob($path."data/users/*.php") as $data) {
      include $data;
      if ($author_photo == false) {
        $author_photo = $path."imgs/profile-photo.png";
      }
      $username_p1 = str_replace($path."data/users/", "", $data);
      $username = str_replace(".php", "", $username_p1);
      if ($username==$owner) {
        $its_owner = " <span style=\"align-self: center; font-size: small;\" class=\"badge bg-warning text-dark\">Owner</span>";
      } else {
        $its_owner = "";
      }
      echo <<<EOT
        <a href="?u=$username">
          <article style="display: flex;">
            <img style="float: left;" class="photo type_profile" src="$author_photo">
            <br>
            <h1 style="margin: 0 auto;">$author_name$its_owner</h1>
            <p style="float: right; align-self: center;">@$username</p>
          </article>
        </a>
EOT;
    }
    echo "\n      </div>\n";
  }
  include $path."themes/".$theme_pack."/footer.php";
} elseif(isset($_GET["login"])) {
  // login system 1
  if(isset($_POST["username"])) {
    if (file_exists($path."data/users/".$_POST["username"].".php")) {
      include $path."data/users/".$_POST["username"].".php";
      if(isset($_POST["password"])) {
        if (password_verify($_POST["password"], $password)) {
          $_SESSION["login_name"] = $_POST["username"];
          $_SESSION["login_pass"] = $_POST["password"];
          if(isset($_GET["redirect"])) {
            header("Location: ".$_GET["redirect"]);
          } else {
            header("Location: ?dashboard");
          }
        } else {
          header("Location: ?login&failed");
        }
      } else {
        header("Location: ?login&failed");
      }
    } else {
      header("Location: ?login&failed");
    }
  } else {
    include $path."startvisualcore.php";
    include $path."themes/".$theme_pack."/header.php"; ?>
      <div class="art_content" style="display: flex; margin: 10px 3.5%;">
        <form style="float: left; width: 100%; align-self: center;" id="login_thing" method="POST" action="?login">
          <h1 style="color: white;">Identify youself</h1>
          <input type="text" name="username" placeholder="Username"><br>
          <input type="password" name="password" placeholder="Password"><br>
          <input type="submit" value="Login">
        </form>
        <article style="float: right; width: 100%; align-self: center;">
          <h1>Log in to</h1>
          <ul>
            <li>Administrate your blog (Only owner)</li>
            <li>Publish & edit new articles</li>
            <li>Edit your profile</li>
          </ul>
        </article>
      </div>
<?php if(isset($_GET["failed"])) { ?>
      <div class="alert alert-danger" role="alert" style="margin: 10%;">The username and/or the password you've put is/are incorrect, please complete the form again</div>
<?php }
    include $path."themes/".$theme_pack."/footer.php";
  }
} elseif(isset($_GET["recover_password"])) {
  // login system 1
  if(isset($_POST["username"])) {
    if (file_exists($path."data/users/".$_POST["username"].".php")) {
      include $path."data/users/".$_POST["username"].".php";
      if(isset($_POST["code"])) {
        if (password_verify($_POST["code"], $password_code)) { ?>
      <div class="art_content" style="text-align: center; margin: 10px 3.5%;">
        <form style="width: 100%; align-self: center;" id="login_thing" method="POST" action="?recover_password&recover">
          <h1 style="color: white;">Password recovery system</h1>
          <input type="text" name="username" placeholder="Username"><br>
          <input type="text" name="code" placeholder="Recovery code"><br>
          <input type="submit" value="Recover">
        </form>
      </div>
<?php   } else {
          header("Location: ?recover_password&failed");
        }
      } else {
        header("Location: ?recover_password&failed");
      }
    } else {
      header("Location: ?recover_password&failed");
    }
  } else {
    include $path."startvisualcore.php";
    include $path."themes/".$theme_pack."/header.php"; ?>
      <div class="art_content" style="text-align: center; margin: 10px 3.5%;">
        <form style="width: 100%; align-self: center;" id="login_thing" method="POST" action="?login">
          <h1 style="color: white;">Password recovery system</h1>
          <input type="text" name="username" placeholder="Username"><br>
          <input type="text" name="code" placeholder="Recovery code"><br>
          <input type="submit" value="Recover">
        </form>
      </div>
<?php if(isset($_GET["failed"])) { ?>
      <div class="alert alert-danger" role="alert" style="margin: 10%;">The username and/or the password you've put is/are incorrect, please complete the form again</div>
<?php } elseif(isset($_GET["done"])) { ?>
      <div class="alert alert-warning" role="alert" style="margin: 10%;">Coming soon</div>
<?php }
    include $path."themes/".$theme_pack."/footer.php";
  }
} elseif(isset($_GET["logout"])) {
  unset($_SESSION["login_name"]);
  unset($_SESSION["login_pass"]);
  header("Location: ?");
} elseif(isset($_GET["dashboard"])) {
  if(isset($_SESSION["login_name"])) {
    if(isset($_SESSION["login_pass"])) {
      include $path."data/users/".$_SESSION["login_name"].".php";
      if ($author_name==false) {
        $your_name = "@".$_SESSION["login_name"];
      } else {
        $your_name = $author_name;
      }
      include $path."startvisualcore.php";
      include $path."themes/".$theme_pack."/header.php"; ?>
      <div class="art_content">
        <h1 style="color: white; margin: 10px 3.5%;">Welcome, <?php echo $your_name." "; if($_SESSION["login_name"]==$owner) { ?><span style="align-self: center; font-size: small;" class="badge bg-warning text-dark">Owner</span><?php } ?></h1>
        <a href="?create-article"><button>Create article</button></a>
      </div>
<?php include $path."themes/".$theme_pack."/footer.php";
    } else {
      die("u are hacking this website, please stop.");
    }
  } else {
    header("Location: ?login&redirect=dashboard");
  }
} elseif(isset($_GET["create-article"])) {
  if(isset($_SESSION["login_name"])) {
    if(isset($_SESSION["login_pass"])) {
      include $path."startvisualcore.php";
      include $path."themes/".$theme_pack."/header.php"; ?>
      <div class="art_content">
        <h1 style="color: white; margin: 10px 3.5%;">:-)</h1>
      </div>
<?php include $path."themes/".$theme_pack."/footer.php";
    } else {
      die("u are hacking this website, please stop.");
    }
  } else {
    header("Loaction: ?login&redirect=create-article");
  }
} elseif(isset($_GET["manifest"])) {
  header("Content-Type: application/json"); ?>
{
  "name": "<?php echo $blog_name; ?>",
  "short_name": "<?php echo $blog_name; ?>",
  "start_url": "<?php echo $_SERVER["PHP_SELF"]; ?>",
  "scope": "./",
  "icons": [
    {
      "src": "<?php echo $path."imgs/bmicon72.png" ?>",
      "sizes": "72x72",
      "type": "image/png"
    },
    {
      "src": "<?php echo $path."imgs/bmicon.png" ?>,
      "sizes": "144x144",
      "type": "image/png"
    }
  ],
  "theme_color": "#e7e7ff",
  "background_color": "#e7e7ff",
  "display": "standalone"
}
<?php } else {
  include $path."startvisualcore.php";
  include $path."themes/".$theme_pack."/header.php";
  echo '<div style="text-align: center;"><br><p>Coming Soon a feed</p></div>';
  //include "data/feed.html";
  include $path."themes/".$theme_pack."/footer.php";
} ?>