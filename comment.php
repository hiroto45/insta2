<?php
//Db接続
include('./dbconfig.php');
//コメントデータベースに保存
$ImagedId = $_GET['id'];
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['comment'])){
  try{
    $stmt = $dbh->prepare("INSERT INTO `comment.bbs` (`comment`,`imagd_id`) VALUES (:comment,:imagd_id)");
    $stmt->bindParam(':comment', $_POST['comment']);
    $stmt->bindParam(':imagd_id', $ImagedId);
    $commentdata = $stmt->execute();

    $uri = $_SERVER['HTTP_REFERER'];
    header('Location: ' . $uri);
    exit();
    }catch(PDOException $e){
      echo $e->getmessage();
    }
    //保存したコメントを取得する
  }else{
    $uri = $_SERVER['HTTP_REFERER'];
    header('Location: ' . $uri);
    exit();
  }


?>