<!DOCTYPE html>
<html>
  <head>
      <!-- Thanks to @Vandesm14 and Repl.it for the original template (@templates/Personal-Blog-Site) -->
      <!-- Feed created using Feedlang -->
      <!-- Feedlang was created by Lucas M.T. in 2020 -->
      <meta charset="utf-8">
      <!-- <link rel="alternate" type="application/feedlang" title="Feedlang Feed" href="data/feed.html" /> -->
      <link rel="icon" href="<?php echo $final_blog_photo; ?>">
      <!-- Theme -->
      <link rel="stylesheet" href="<?php echo 'bm-'.$this_file.'/themes/'.$theme_pack.'/css/'; ?><?php if($theme=='light') { ?>light.css<?php } elseif($theme=='dark') { ?>dark.css<?php } else { ?>light.css<?php } ?>">
      <!-- Open Graph -->
      <!-- <meta property="og:url" content="<?php // echo $_SERVER['HTTP_REFERER']; ?>" />
      <meta property="og:image" content="<?php // echo $icon_final; ?>" />
      <meta property="og:type" content="webpage" /> -->
    <!-- <meta property="og:title" content="<?php echo $blog_name; ?>" /> -->