<html>
<head>
<meta charset="UTF-8">
<title>mission2-3.php</title>
</head>

<body>

<h1>text配列読み込み2</h1>

<form action=" " method="post">
　<input type="text" name="name" placeholder="名前"><br>
　<input type="text" name="comment" placeholder="コメント"><br>
　<input type="submit" value="送信"><br>
　<input type="text" name="sakujo" placeholder="削除対象番号"><br>
　<input type="submit" value="削除"><br>
</form>

</body>
</html>


<?php
//変数宣言
$name=$_POST["name"];
$comment=$_POST["comment"];
$nitiji=date("Y-m-d H:i:s");
$sakujo=$_POST["sakujo"];
$filename='mission_2-1.txt';

//入力されたコメントと名前を書き込んで表示
$fp=fopen($filename,"a");

$count=count(file($filename))+1;

$hyouji="$count<>$name<>$comment<>$nitiji";

if(!empty($_POST["name"]) && !empty($_POST["comment"])){
  fwrite($fp, $hyouji.PHP_EOL);

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
}

//削除機能
elseif(!empty($_POST["sakujo"])){

$contents2=@file($filename);
$fp2=fopen($filename,"w");

   foreach($contents2 as $line2){
    $new_line2=explode("<>",$line2);

	if($new_line2[0]!=($_POST["sakujo"])){
	  fwrite($fp2, $line2);
	 
           echo $new_line2[0] ."&nbsp".":".
      	        $new_line2[1] ."&nbsp".
      		$new_line2[2] ."&nbsp".
      		$new_line2[3] ."&nbsp".
      		$new_line2[4] ."<br>";
	 }
   }
fclose($fp2);
}



//フォームが空のとき
if(empty($_POST["name"]) && empty($_POST["comment"])){
  if(empty($_POST["sakujo"])){
  
     $contents=@file($filename);

     foreach($contents as $line){
     $new_line=explode("<>",$line);
 
   echo $new_line[0] ."&nbsp".":".
        $new_line[1] ."&nbsp".
        $new_line[2] ."&nbsp".
        $new_line[3] ."&nbsp".
        $new_line[4] ."<br>";

   }
 }

}
?>

