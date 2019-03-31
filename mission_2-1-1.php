<html>
<head>
<meta charset="UTF-8">
<title>mission2-1</title>
</head>
<body>

<h1>2-1</h1>

<?php
$name=$_POST["name"];
$comment=$_POST["comment"];
$nitiji=date("Y-m-d H:i:s");

$filename='mission_2-1.txt';

$fp=fopen($filename,"a");

$count=count(file($filename))+1;

$hyouji="$count<>$name<>$comment<>$nitiji";

if(!empty($_POST["name"]) && !empty($_POST["comment"])){
  fwrite($fp, $line.$hyouji.PHP_EOL);
}

fclose($fp);


?>

</body>
</html>
