<?php
  $title = 'Home Page';
  $copyfrom = '2000';
  $keywords = 'local friends, visiting, pastoral care';
  $varpath = './';
  include "{$varpath}inc/head.inc";
  echo "<p>Body text</p>";
  include "https://github.com/PaulHazelden/webdown/blob/main/index.htm?raw=true";
  echo "<p>Body text 2</p>";
  include "https://github.com/PaulHazelden/webdown/blame/8cb2b3288af5af92182f323466e221e779d69112/jh-overview.md";
  $html = file_get_contents('https://github.com/PaulHazelden/webdown/blob/main/index.htm?raw=true');
  echo $html;
  echo "<p></p>Again!</p>";
footer ();
?>
