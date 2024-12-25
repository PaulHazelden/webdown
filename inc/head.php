<!doctype html>
<!-- Standard page text generated by head.php 06.01.2024 20:59:55 -->
<?php

   $longtitle = "Just Human? - " . $title;
   if (empty($author)) { $author = "Just Human?"; }
   if (empty($title2)) {
     $longtitle = "Just Human? - " . $title;
     $pagehead = $title;
   }
   else {
     $longtitle = "Just Human? - " . $title . " - " . $title2;
     $pagehead = $title . "<br><small>" . $title2 . "</small>";
   }
   if (empty($create)) { $create = date("j F Y", filemtime('index.php')); }

   $file1 = $_SERVER['SCRIPT_FILENAME'];
   $file2 = basename($file1);
   $file3 = substr($file2, 0, strpos($file2, ".")) . ".cnt" ;
   $mainpos = strpos($file1, '/jh/') + 4;
   $maindir = substr($file1, 0, $mainpos);
   $breaddir = substr($file1, $mainpos);
   $breadpos = strlen($breaddir) - 9;
   $bread = substr($breaddir, 0, $breadpos);
   
   #
   # Debugging details
   #
   echo "<!-- file1: $file1 -->\n";
   echo "<!-- file2: $file2 -->\n";
   echo "<!-- file3: $file3 -->\n";
   echo "<!-- mainpos: $mainpos -->\n";
   echo "<!-- maindir: $maindir -->\n";
   echo "<!-- breaddir: $breaddir -->\n";
   echo "<!-- breadpos: $breadpos -->\n";
   echo "<!-- bread: $bread -->\n";


   # Increment the page count file
   if (!file_exists($file3)) {
#    echo "The file $file3 does not exist";
    file_put_contents($file3, "1");
} else {
#    echo "The file $file3 does exist";
}
   $pagecount = file_get_contents($file3) + 1;
#echo "<p>pagecount: '$pagecount' </p>\n";
   $f = fopen($file3, 'w');
#echo "<p>fopen: '$f' </p>\n";
   fwrite($f, $pagecount);
   fclose($f);

   echo "<!-- Hit count for " . $file2 . ": " . $pagecount . "-->

<html lang='en'>
<head>
  <meta charset='utf-8'>
  <meta name='Keywords' content='$keywords'>
  <meta name='Author' content='$author'>
  <meta name='Description' content='$longtitle'>
  <title>$longtitle</title>
  <link rel='stylesheet' type='text/css' href='${varpath}inc/styles.css'>
</head>

<body>
<!-- Menu -->
<div class='row'>
  <div class='col-1 col-s-1'>
    <center>&nbsp;</center>
  </div>

  <div class='col-2 col-s-3'>
    <div class='topnav' id='myTopnav'>
    <ul id='menu'>\n";
include "${varpath}inc/nav.inc";
echo "    </ul>
    </div>\n\n";

   #
   # Create the breadcrumb
   #
   echo "<!-- Breadcrumb -->\n";
   echo "    <p>\n      <a href='${varpath}'>home</a>\n";
   $maindir = substr($bread, 0, 4);
   $crumbdir = $varpath . $maindir;
   if ( $bread !== '' ) {
     $level = 0;
     echo "<!-- $level $crumbdir -->\n";
     $pos = strpos($bread,'/');
     $bread = substr($bread, $pos+1);
     while (strpos($bread,'/') > 0) {
       ++$level;
       $pos = strpos($bread,'/');
       $enddir = substr($bread, 0, $pos);
       $crumbdir .= $enddir .'/';
       echo "<!-- $level $crumbdir -->\n";
       echo "    / <a href='${crumbdir}'>${enddir}</a>\n";
       $bread = substr($bread, $pos+1);
     }
   }
   echo "    </p>

<!-- Page Title -->
<!--    <div style='padding-left:16px'>  -->
    <div>
      <a href='${varpath}'><img src='${varpath}inc/JH_Logo_210803.png'
      alt='\'Just Human?\' logo' width=800></a>
      <p id='dh'>${pagehead}</p>\n\n";
      echo "<!-- Maindir: $maindir -->\n";
      switch ($maindir) {
        case 'art/':
          echo "    <p>[Article created $create by $author]</p>\n";
          break;
        case 'sys/':
          echo "    <p>[Page created $create]</p>\n";
          break;
        case 'blg/':
          echo "    <p>[Blog post created $create by $author]</p>\n";
          break;
        case '':
          echo "    <p>[Home page created $create]</p>\n";
          break;
        default:
          echo "    <p>[Unknown page type '${maindir}' created $create by $author]</p>\n";
          break;
      }

includefile ("main.htm");

$loop1 = 1;
$filestart1 = "comment-";
$comment1 = $filestart1 . $loop1 . ".htm";
echo "<!-- Comment1: $comment1 -->\n";
while (file_exists($comment1)) {
  echo "<!-- Loop1: $loop1 -->\n";
  echo "<div style='padding-left:16px; border-left: solid;'>\n";
  includefile ($comment1);
  $filestart2 = $filestart1 . $loop1 . "-";
  $loop2 = 1;
  $comment2 = $filestart2 . $loop2 . ".htm";
  echo "<!-- Comment2: $comment2 -->\n";
  while (file_exists($comment2)) {
    echo "<!-- Loop2: $loop2 -->\n";
    echo "<div style='padding-left:16px; border-left: solid;'>\n";
    includefile ($comment2);
    echo "</div>\n";
    $loop2 += 1;
    $comment2 = $filestart2 . $loop2 . ".htm";
  }
  echo "</div>\n";
  $loop1 += 1;
  $comment1 = $filestart1 . $loop1 . ".htm";
}

footer();

function includefile ($incfile) {
  echo "<!-- start of include file $incfile -->\n";
  echo "<p>[Last changed " . date("j F Y H:i:s", filemtime($incfile)) . "]</p>\n\n";
  include $incfile;
  echo "<p>&nbsp;</p>\n\n";
}


function footer ($text="") {
global $varpath, $file2, $author, $pagecount;
echo "
      <p>&nbsp;</p>
      <hr>
    </div>
  </div>
</div>

<div class='footer'>
  <p><i>Footer details for Just Human?</i></p>
  <p><small>All attributed content is copyright &copy; the named author<br>
  All other content is copyright &copy; the Just Human? administrator<br>
    ${file2} was last updated " . date("j F Y", filemtime($file2)) . "
    <br>Page counter: ${pagecount}, site counter at " . date('H:i \o\n j F Y', time() + 3600 ) . ":


<!-- Default Statcounter code for Just Human Testing  http://hazelden.org.uk/jh -->
<script type='text/javascript'>
var sc_project=12951158;
var sc_invisible=0;
var sc_security='df8b8356';
var sc_text=2;
var scJsHost = 'https://';
document.write('<sc'+'ript type=\'text/javascript\' src=\'https://statcounter.com/counter/counter.js\'></'+'script>');
</script>
<noscript><div class='statcounter'><a title='web counter'
href='https://statcounter.com/' target='_blank'><img
class='statcounter'
src='https://c.statcounter.com/12951158/0/df8b8356/0/'
alt='web counter'
referrerPolicy='no-referrer-when-downgrade'></a></div></noscript>
<!-- End of Statcounter Code -->
</div>


<script>
  function myFunction() {
    var x = document.getElementById('myTopnav');
    if (x.className === 'topnav') {
      x.className += ' responsive';
    } else {
      x.className = 'topnav';
    }
  }
</script>

</body>
</html>
";
}


function getpdf($dir, $name, $desc) {
   global $varpath;
   # access a PDF file
   $downc = $name . ".dwn";
   $downf = $varpath . $dir . $name . ".pdf";

   if (file_exists($downf)){
      $count = file_get_contents($downc) + 1;
      echo "<a target='_blank' href=\"${varpath}getpdf.htm?target=" . $dir . $name . "\">$desc</a> <!--  Downloads: $count  -->";
   }
   else{
      echo "Warning: <b>$downf</b> does not exist. ";
   }
}


?>