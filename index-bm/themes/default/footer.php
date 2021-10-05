    </main>
    <footer>
      <article class="post_footer">
        <p><?php if($footer_text==false){}else{echo $footer_text;} ?></p>
        <p>Powered by <a href="https://github.com/absucc/bitamodern">Bitamodern</p>
      </article>
    </footer>
    <a href="#"><button class="bp downtoup_arrow"><i class="fa fa-arrow-circle-up fa-2x" aria-hidden="true"></i></button></a>
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

    <script type="text/javascript" src="themes/<?php echo $theme_pack; ?>/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="themes/<?php echo $theme_pack; ?>/js/likely.js"></script>
    <script> 
      window.addEventListener('load', () => { 
        registerSW(); 
      }); 
      async function registerSW() { 
        if ('serviceWorker' in navigator) { 
          try { 
            await navigator 
                  .serviceWorker 
                  .register('sw.js'); 
          } 
          catch (e) { 
            console.log("sw reg failed"); 
          } 
        } 
      } 
    </script>
    <!-- Blog posts based on Change-the-Text -->
    <!-- Coded by absucc -->
  </body>
</html>