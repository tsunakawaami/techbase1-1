<html>
<head>
<meta charset="UTF-8">
<title>mission2-2.php</title>
</head>

<body>

<h1>text配列読み込み2</h1>

<form action="http://データベース/mission_2-2.php" method="post">
　<input type="text" name="name" placeholder="名前"><br>
　<input type="text" name="comment" placeholder="コメント"><br>
　<input type="submit" value="送信"><br>


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



$contents=@file($filename);

foreach($contents as $line){
 $new_line=explode("<>",$line);

 echo $new_line[0] ."&nbsp".":".
      $new_line[1] ."&nbsp".
      $new_line[2] ."&nbsp".
      $new_line[3] ."&nbsp".
      $new_line[4] ."<br>";
}

?>

</body>
</html>

