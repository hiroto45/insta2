<?php
include('./dbconfig.php'); 
   
  $data = array();
  $uri = $_SERVER['REQUEST_URI'];
  if(strpos($uri,'ImageDetail.php') !== false){
     $Imageid = $_GET['id'];
     $sql = "SELECT * FROM user1 WHERE id = ?";
     $stmt = $dbh->prepare($sql);  
     $stmt->execute(array($Imageid));
     $data['QueryImageId'] = $stmt->fetch();

     $sql2 = "SELECT * FROM `comment.bbs` WHERE imagd_id=? ORDER BY id DESC";
     $stml2 = $dbh->prepare($sql2);
     $stml2->execute(array($Imageid));
     $data['comments'] = $stml2->fetchAll();
     $CountCommnet = count($data['comments']);
  }else{
    //ファイル名を取得する
    $sql = "SELECT * FROM user1  ORDER BY `time` DESC";
    $stmt = $dbh->query($sql);
    $data = $stmt->fetchAll();
  }
?>