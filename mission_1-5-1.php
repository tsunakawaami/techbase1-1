<html>
<head>
<meta charset="UTF-8">
<title>mission15.php</title>
</head>
<body>

<h1>条件分岐</h1>

<?php
$comment=$_POST["comment"];
$iwai="おめでとう！";
                 
if ($comment=="完成！"){
    echo $iwai;
}


$filename='mission_1-5.txt';

$fp=fopen($filename,'w');

if(!empty($_POST["comment"])){
fwrite($fp, $comment);
}

fclose($fp);

?>

</body>
</html>
