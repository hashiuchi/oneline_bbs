<?php

$id = $_POST['id'];
$nickname = $_POST['nickname'];
$comment = $_POST['comment'];

$dsn = 'mysql:dbname=oneline_bbs;host=localhost';
$user = 'root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');

//SQL文を実行する

$sql='UPDATE `posts` SET `nickname`=?, `comment` =? WHERE `id`=?';
$data[]=$nickname;
$data[]=$comment;
$data[]=$id;
$stmt= $dbh->prepare($sql);
$stmt->execute($data);

$comment = $stmt->fetch(PDO::FETCH_ASSOC);


//データベースの切断
$dbh=null;






header("Location: bbs.php");
exit();