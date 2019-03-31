<?php
//ファイルを変数に格納（代入）したい
$filename='mission_1-2.txt';
//ファイルを読み込み変数に格納（代入）したい
$content=file_get_contents($filename);

//ファイルの中身を出力
echo $content;
?>
