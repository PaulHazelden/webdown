<!doctype html>
<!-- Standard page text generated by test1.phpc 23 December 2023 18:53 -->
<html lang='en'>
<head>
  <meta charset='utf-8'>
  <meta name='Keywords' content='test'>
  <meta name='Author' content='paul'>
  <meta name='Description' content='Testing PHP'>
  <title>PHP Testing</title>
  <link rel='stylesheet' type='text/css' href='styles.css'>
</head>

<body>
<?php

echo "<p>Hello world</p>\n";

   $file1 = $_SERVER['SCRIPT_FILENAME'];
   $file2 = basename($file1);
   $file3 = substr($file2, 0, strpos($file2, ".")) . ".cnt" ;

echo "<p>file1: $file1 </p>\n";
echo "<p>file2: $file2 </p>\n";
echo "<p>file3: $file3 </p>\n";


   # Increment the page count file
   $pagecount = file_get_contents($file3) + 1;
echo "<p>Pagecount: '$pagecount' </p>\n";
   $f = fopen($file3, 'w');
echo "<p>fopen: '$f' </p>\n";
   fwrite($f, $pagecount);
   fclose($f);

?>
</body>
</html>
