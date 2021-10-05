    <?php
      if (isset($_GET["p"])) {
        if($theme == "light") { ?>
    <a href="?p=<?php echo $_GET["p"]; ?>&theme=dark"><button class="bp theme"><i class="fa fa-moon fa-2x" aria-hidden="true"></i></button></a>
        <?php } elseif($theme == "dark") { ?>
    <a href="?p=<?php echo $_GET["p"]; ?>&theme=light"><button class="bp theme"><i class="fa fa-sun fa-2x" aria-hidden="true"></i></button></a>
        <?php } else { ?>
    <a href="?p=<?php echo $_GET["p"]; ?>&theme=dark"><button class="bp theme"><i class="fa fa-moon fa-2x" aria-hidden="true"></i></button></a>
        <?php }
      } elseif (isset($_GET["u"])) {
        if($theme == "light") { ?>
    <a href="?u=<?php echo $_GET["u"]; ?>&theme=dark"><button class="bp theme"><i class="fa fa-moon fa-2x" aria-hidden="true"></i></button></a>
        <?php } elseif($theme == "dark") { ?>
    <a href="?u=<?php echo $_GET["u"]; ?>&theme=light"><button class="bp theme"><i class="fa fa-sun fa-2x" aria-hidden="true"></i></button></a>
        <?php } else { ?>
    <a href="?u=<?php echo $_GET["u"]; ?>&theme=dark"><button class="bp theme"><i class="fa fa-moon fa-2x" aria-hidden="true"></i></button></a>
      <?php }
      } elseif (isset($_GET["writers"])) {
        if($theme == "light") { ?>
    <a href="?writers&theme=dark"><button class="bp theme"><i class="fa fa-moon fa-2x" aria-hidden="true"></i></button></a>
        <?php } elseif($theme == "dark") { ?>
    <a href="?writers&theme=light"><button class="bp theme"><i class="fa fa-sun fa-2x" aria-hidden="true"></i></button></a>
        <?php } else { ?>
    <a href="?writers&theme=dark"><button class="bp theme"><i class="fa fa-moon fa-2x" aria-hidden="true"></i></button></a>
        <?php }
       } else {
         if($theme == "light") { ?>
    <a href="?theme=dark"><button class="bp theme"><i class="fa fa-moon fa-2x" aria-hidden="true"></i></button></a>
        <?php } elseif($theme == "dark") { ?>
    <a href="?theme=light"><button class="bp theme"><i class="fa fa-sun fa-2x" aria-hidden="true"></i></button></a>
        <?php } else { ?>
    <a href="?theme=dark"><button class="bp theme"><i class="fa fa-moon fa-2x" aria-hidden="true"></i></button></a>
       <?php } } ?>