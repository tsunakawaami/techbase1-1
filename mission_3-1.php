<?php
//3-1
$dsn='データベース名';
$user='ユーザー名';
$password='パスワード';
$pdo=newPDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE=>
PDO::ERRMODE_WARNING));

//3-2
$sql="CREATE TABLE IF NOT EXISTS tbtest"
."("
."id INT,"
."name char(32),"
."comment TEXT"
.");";
$stmt=$pdo->query($sql);

//3-3
$sql='SHOW TABLE';
$result
?>

