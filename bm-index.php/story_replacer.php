<?php
$bold_story1 = str_replace("[b]", "<b>", $story);
$bold_story = str_replace("[/b]", "</b>", $bold_story1);
$code_story1 = str_replace("[code]", "<code>", $bold_story);
$code_story = str_replace("[/code]", "</code>", $code_story1);
$enter_story = str_replace("\n", "<br>", $code_story);
$youtube_story1 = str_replace("[youtube]", "<iframe src=\"https://www.youtube.com/embed/", $enter_story);
$youtube_story = str_replace("[/youtube]", "\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>", $youtube_story1);
$dailymotion_story1 = str_replace("[dailymotion]", "<div style=\"position:relative;padding-bottom:56.25%;height:0;overflow:hidden;\"><iframe style=\"position:absolute;left:0px;top:0px;overflow:hidden\" frameborder=\"0\" type=\"text/html\" src=\"https://www.dailymotion.com/embed/video/", $youtube_story);
$dailymotion_story = str_replace("[/dailymotion]", "?autoplay=0\" allowfullscreen allow=\"autoplay\"></iframe></div>", $dailymotion_story1);
$vimeo_story1 = str_replace("[vimeo]", "<iframe src=\"https://player.vimeo.com/video/", $dailymotion_story);
$vimeo_story = str_replace("[/vimeo]", "\" frameborder=\"0\" allow=\"autoplay; fullscreen\" allowfullscreen></iframe>", $vimeo_story1);
$list_story_part1_1 = str_replace("[list]", "<ul>", $vimeo_story);
$list_story_part1 = str_replace("[/list]", "</ul>", $list_story_part1_1);
$imgbanner_story1 = str_replace("[imgbanner]", "<img class=\"banner\" src=\"", $list_story_part1);
$final_story = str_replace("[/imgbanner]", "\" alt=\"Banner\">", $imgbanner_story1);
// $list_story2 = str_replace("- ", "<li>", $list_story1);
//$img_story1 = str_replace("[img]", "<img src=\"", $);
?>