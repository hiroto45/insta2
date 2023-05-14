<?php
include('dbconfig.php');

//アップしたファイルをimagesディレクトリに保存する
$Imagesdirectory = './img/';
$FileName = basename($_FILES['file']['name']);
$TragetFilepath = $Imagesdirectory . $FileName;
$fileType = pathinfo($FileName,PATHINFO_EXTENSION);

try{
  if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($FileName)){
    $arrayImageType = ['jpg','png','jpeg','gif','pdf'];
    //拡張子の確認
    if(in_array($fileType,$arrayImageType)){
      $PostImageForServer = move_uploaded_file($_FILES['file']['tmp_name'],$TragetFilepath);
    }
    //DB保存
    $stmt = $dbh->prepare("INSERT INTO user1 (file_name) VALUES (:file_name)");
   $stmt->bindParam(':file_name', $FileName);
   $stmt->execute();
  };
}catch(PDOException $e){
  echo $e->getmessage();
}


header('Location: ./index.php');
exit();

?>