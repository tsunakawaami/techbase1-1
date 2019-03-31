
<html>
<head>
<meta charset="UTF-8">
<title>mission2-4.php</title>
</head>

<body>
<h1>編集機能</h1>

<?php

//変数宣言
$name=$_POST["name"];
$comment=$_POST["comment"];
$nitiji=date("Y-m-d H:i:s");
$sakujo=$_POST["sakujo"];
$kakusu=$_POST["kakusu"];
$hensyu=$_POST["hensyu"];
$filename='mission_2-1.txt';

//編集機能（入力フォームへの表示）
if(!empty($_POST["hensyu"])){
  $contents3=@file($filename);

    foreach($contents3 as $line3){
      $new_line3=explode("<>",$line3);

	if($new_line3[0]==($_POST["hensyu"])){
	   $kakusu=$new_line3[0];
      	   $name3=$new_line3[1];
           $comment3=$new_line3[2];

		}
	}
}

?>

<!__ 入力フォームおよびPOST受け取り __>
<form action="http://データベース/mission2-4(try).php " method="post">
　<input type="text" name="name" value="<?php echo $name3;?>"><br>
　<input type="text" name="comment" value="<?php echo $comment3;?>"><br>
　<input type="hidden" name="kakusu" value="<?php echo $kakusu;?>"><br>
　<input type="submit" value="送信"><br>
<br>
　<input type="text" name="sakujo" placeholder="削除対象番号"><br>
　<input type="submit" value="削除"><br>
<br>
　<input type="text" name="hensyu" placeholder="編集対象番号"><br>
　<input type="submit" value="編集"><br>
</form>


<?php
//入力されたコメントと名前を書き込んで表示
if(!empty($_POST["name"]) && !empty($_POST["comment"])){
     
  //名前、コメントが空でなく、隠しフォームは空のとき…if①
	$contents5=@file($filename);
	$fp=fopen($filename,"a");

	$count=count(file($filename))+1;

	$hyouji="$count<>$name<>$comment<>$nitiji";

 	 fwrite($fp, $hyouji.PHP_EOL);
	 fclose($fp);
  
 }//…if①閉じる

//削除機能
elseif(!empty($_POST["sakujo"])){ //…if②

$contents2=@file($filename);
$fp2=fopen($filename,"w");

   foreach($contents2 as $line2){
    $new_line2=explode("<>",$line2);

	if($new_line2[0]!=($_POST["sakujo"])){ //…if③
	  fwrite($fp2, $line2);

	 }//…if③閉じる
   }//foreach閉じる
fclose($fp2);
}//…if②閉じる



//編集処理
if(!empty($kakusu)&&!empty($_POST["name"])){ 
  if(!empty($_POST["comment"])){
   //隠しフォーム、名前、コメントが空でないとき…if④

   $contents4=@file($filename);
   $fp4=fopen($filename,"w"); //ファイルを開く
   $kakusu=$_POST["kakusu"];
   $hyouji2="$kakusu<>$name<>$comment<>$nitiji";

   foreach($contents4 as $line4){
   $new_line4=explode("<>",$line4);

    
	//編集番号と投稿番号が等しいとき（差し替え）…if⑤
	if($new_line4[0]==$kakusu){

	  fwrite($fp4, $hyouji2.PHP_EOL);
	
		
	}//if⑤を閉じる


	//編集番号と投稿番号が等しくないとき（写す）…if⑥
	elseif($new_line4[0]!=$kakusu){
	  
		fwrite($fp4, $line4);

	}//if⑥を閉じる

   }//foreach閉じる
fclose($fp4);
 }
}//if④を閉じる




//フォームが空のとき
elseif(empty($_POST["name"]) && empty($_POST["comment"])){
    if(empty($_POST["sakujo"])&& empty($_POST["hensyu"])){
  
     $contents=@file($filename);
}
}




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


