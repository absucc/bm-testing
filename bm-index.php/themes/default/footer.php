    </main>
    <footer>
      <article class="post_footer">
        <p><?php if($footer_text==false){}else{echo $footer_text;} ?></p>
        <p><a href="#">Default</a> Theme - Powered by <a href="https://github.com/absucc/bitamodern">Bitamodern</p>
      </article>
    </footer>
    <a href="#"><button class="bp downtoup_arrow"><i class="fa fa-arrow-circle-up fa-2x" aria-hidden="true"></i></button></a>
    <?php include $path."themes/themes.php" ?>

    <script type="text/javascript" src="<?php echo $path.'themes/'.$theme_pack.'/js/bootstrap/bootstrap.bundle.min.js' ?>"></script>
    <script type="text/javascript" src="<?php echo $path.'themes/'.$theme_pack.'/js/likely.js' ?>"></script>
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