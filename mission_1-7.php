<html>
<head>
<meta charset="UTF-8">
<title>mission1-7.php</title>
</head>

<body>

<h1>text配列読み込み</h1>

<?php

$filename='mission_1-6.txt';

$contents=@file($filename);

foreach($contents as $line){
 echo $line."<br/>";
}

?>
