<?php
  include('./dbconfig.php');
  $targetdirectory = './img/';
  $ImagedId = $_GET['id'];

  if(!empty($_GET['id'])){
    $sql = "SELECT * FROM user1 WHERE id = ?";
    $stml = $dbh->prepare($sql);
    $stml->execute(array($ImagedId));
    $deleteImade = $stml->fetch();

    $DeletedImage= unlink($targetdirectory . $deleteImade['file_name']);
    if($DeletedImage){
     $sql =  "DELETE FROM user1 WHERE id = ? ";
     $stml = $dbh->prepare($sql);
     $stml->execute(array($ImagedId));
    }
 
    header('Location: ./index.php');
    exit();
  }
  
?>