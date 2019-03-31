<html>
<head>
<meta charset="UTF-8">
<title>mission1-6.php</title>
</head>
<body>

<h1>text追加</h1>

<?php
$comment=$_POST["comment"];

$filename='mission_1-6.txt';

$fp=fopen($filename,"a");

$count=

if(!empty($_POST["comment"])){
  fwrite($fp, $line.$comment.PHP_EOL);
}
fclose($fp);

?>

</body>
</html>
