<form action="http://データベース/mission_2-5-1.php  " method="post">

<?php

//変数宣言
$name=$_POST["name"];
$comment=$_POST["comment"];
$nitiji=date("Y-m-d H:i:s");
$sakujo=$_POST["sakujo"];
$kakusu=$_POST["kakusu"];
$hensyu=$_POST["hensyu"];


$pass=$_POST["pass"];
$pass2=$_POST["pass2"];
$pass3=$_POST["pass3"];
$pass4=$_POST["pass4"];


$filename='mission_2-5.txt';

//編集機能（入力フォームへの表示）

echo "編集対象番号".$hensyu."<br>";

if(!empty($hensyu)){ //if①
  //編集番号フォームが空でないとき

  $contents3=@file($filename);

    foreach($contents3 as $line3){ //foreach
      $new_line3=explode("<>",$line3);

	//番号が一致する 且つ パスワードが一致する
	if($new_line3[0]==($_POST["hensyu"]) && $new_line3[4]==$pass3){ //if②
	   $kakusu=$new_line3[0];
      	   $name3=$new_line3[1];
           $comment3=$new_line3[2];
	   $pass4=$new_line3[4];

		} //if②閉じる
	}//foreach閉じる

} //if①閉じる

?>


<html>
<head>
<meta charset="UTF-8">
<title>mission2-5.php</title>
</head>

<body>
<h1>編集機能</h1>

<!__ 入力フォームおよびPOST受け取り __>

<form action="http://データベース/mission_2-5-1.php  " method="post">
　<input type="text" name="name" value="<?php echo $name3;?>"><br>
　<input type="text" name="comment" value="<?php echo $comment3;?>"><br>
　<input type="text" name="pass4" value="<?php echo $pass4;?>"><br>
<!__ ↑編集時にパスワードがファイルに保存されるように __>
  <input type="hidden" name="kakusu" value="<?php echo $kakusu;?>">
　<input type="submit" value="送信"><br>
<br>
　<input type="text" name="sakujo" placeholder="削除対象番号"><br>
　<input type="text" name="pass2" placeholder="パスワード"><br>
　<input type="submit" value="削除"><br>
<br>
　<input type="text" name="hensyu" placeholder="編集対象番号"><br>
　<input type="text" name="pass3" placeholder="パスワード"><br>
　<input type="submit" value="編集"><br>
</form>



</body>
</html>



<?php


//変数宣言
$name=$_POST["name"];
$comment=$_POST["comment"];
$nitiji=date("Y-m-d H:i:s");
$sakujo=$_POST["sakujo"];
$kakusu=$_POST["kakusu"];
$hensyu=$_POST["hensyu"];


$pass=$_POST["pass"];
$sakupa=$_POST["pass2"];
$henpa=$_POST["pass3"];

//入力されたコメントと名前を書き込んで表示
if(!empty($pass)&&!empty($name)&&!empty($comment)&&empty($sakujo)&&empty($hensyu)){
      
  //名前、コメント、パスワードが空でないとき…if①
	
	$fp=fopen($filename,"a");

	$count=count(file($filename))+1;

	$hyouji="$count<>$name<>$comment<>$nitiji<>$pass<>";

 	 fwrite($fp, $hyouji.PHP_EOL);
	 fclose($fp);

 }//…if①閉じる

//削除機能
elseif(!empty($_POST["sakujo"])){ //…if①

	$contents2=@file($filename);
	$fp2=fopen($filename,"w");

	    foreach($contents2 as $line2){ //foreach
	    $new_line2=explode("<>",$line2);

		//番号が一致しない 又は パスワードが一致しない
		if($new_line2[0]!=($_POST["sakujo"]) or $new_line2[4]!=$pass2){ //…if②
	  	 fwrite($fp2, $line2);
		}//…if②閉じる

	    }//foreach閉じる
fclose($fp2);

}//…if①閉じる


//編集処理
if(!empty($kakusu)&&!empty($_POST["name"])&&!empty($_POST["comment"])){ 
   //隠しフォーム、名前、コメントが空でないとき…if①

   $contents4=@file($filename);
   $fp4=fopen($filename,"w"); //ファイルを開く
   $kakusu=$_POST["kakusu"];
   $hyouji2="$kakusu<>$name<>$comment<>$nitiji<>$pass4";

   foreach($contents4 as $line4){ //foreach
   $new_line4=explode("<>",$line4);

    
	//編集番号と投稿番号が等しいとき（差し替え）…if②
	if($new_line4[0]==$kakusu){

	  fwrite($fp4, $hyouji2.PHP_EOL);

		
	}//if②閉じる


	//編集番号と投稿番号が等しくないとき（写す）…if③
	elseif($new_line4[0]!=$kakusu){
	  
		fwrite($fp4, $line4);

	}//if③閉じる

   }//foreach閉じる
fclose($fp4);

}//if①閉じる




//フォームが空のとき
elseif(empty($_POST["name"]) && empty($_POST["comment"])){
    if(empty($_POST["sakujo"])&& empty($_POST["hensyu"])){
  
     $contents=@file($filename);
}
}




$contents=@file($filename);

	foreach($contents as $line){ //foreach
	$new_line=explode("<>",$line);

 	echo $new_line[0] ."&nbsp".":".
	     $new_line[1] ."&nbsp".
	     $new_line[2] ."&nbsp".
	     $new_line[3] ."&nbsp".
	     $new_line[4] ."<br>";
	} //foreach閉じる


?>


