<?php
 //DB接続
 try{
  $dbh = new PDO('mysql:host=localhost;dbname=mydb', "root");
 }catch(PDOException $e){
  echo $e->getmessage();
 }

?>