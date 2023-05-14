<?php
  include('./dbconfig.php');
  //新たにアップされたファイルがあるなら、現在の画像をディレクトリから削除
  $Imagesdirectory = './img/';
 $FileName = basename($_FILES['file']['name']);
 $TragetFilepath = $Imagesdirectory . $FileName;
 $fileType = pathinfo($FileName,PATHINFO_EXTENSION);
 $ImageId = $_GET['id'];

 if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($FileName)){
  $arrayImageType = ['jpg','png','jpeg','gif','pdf'];
  //拡張子の確認
  if(in_array($fileType,$arrayImageType)){
    $sql = "SELECT  FROM `user1` WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($_GET['id']));
    $getImageName = $stmt->fetch();
    //現在の画像を削除
    $deleteImage = unlink($Imagesdirectory . $getImageName['file_name']);

    if($deleteImage){
      $UploadedImageForserver = move_uploaded_file($_FILES['file']['tmp_name'],$TragetFilepath);
    }
    if($UploadedImageForserver){
      $sql = "UPDATE `user1` SET file_name = ? WHERE id = ?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($FileName,$ImageId));

      header('Location: ./index.php');
      exit();
    }
  }
 }

?>