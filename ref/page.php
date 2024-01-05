<?php
  # Lookup the page number passed and load the requested page.


   #
   # First, check any parameters being passed
   #

   $req = $_GET["p"];
   if( !isset( $req ) || $req == "" )  {
     echo "No page passed"; exit;
   }
   
     

  $file1 = $_SERVER['SCRIPT_FILENAME'];
  $file2 = basename($file1);
  $file3 = substr($file1, 35);
  
#  echo strlen($file1);
#  mylen = strlen($file1);

  
#  pos = $len - 10;

#  echo "<p>File 1: '" . $file1 . "'</p>\n";
#  echo "<p>File 2: '" . $file2 . "'</p>\n";
#  echo "<p>File 3: '" . $file3 . "'</p>\n";
#  echo "<p>Page  : '" . $req . "'</p>\n";
#  echo "<p>Length: '" . $mylen . "'</p>\n";
#  echo "<p>Part  : '" . substr($file1, $pos) . "'</p>\n";
#  echo "<p>Part  : '" . substr($file1, 35) . "'</p>\n";


$row = 1;
$found = 'n';
if (($handle = fopen("page/0.txt", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      if ($data[0] == $req) {
        $found = 'y';
        $file4 = $data[1];
        break;
      }
    }
    fclose($handle);
}

if ( $found == 'y' ) {
header("Location: ../" . $file4);
die();
}

  $title = 'Page Not Found';
  $keywords = 'just human, cooperate, listen';
  $varpath = '../';
  include "{$varpath}inc/head.inc";
  echo "<p>Page '" . $req . "' cannot be found.  If you followed a link on the site, please report this!</p>\n";
  footer ();

?>
