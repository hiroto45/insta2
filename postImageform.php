<?php
  include('header.php');
 
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <style>
    #submit{
   display: block;
   all: unset;
   width: 70px;
   padding: 10px;
   border-radius: 7px;
   background-color: #44AFFD;
   color: white;
   text-align: center;
   margin: 0 auto;
  
    }
  </style>
  <script>
    function updatefiles(event){
      const ImageForm = document.getElementById('preview');
      ImageForm.src = URL.createObjectURL(event.target.files[0]); 
    }
  </script>
  <?php  if(isset($_GET['id'])) {?>
    <form action="./updateImage.php?id=<?php echo($_GET['id']) ?>" method="post" enctype="multipart/form-data"><?php }else{ ?>
  <form action="postImage.php" method ="POST"  enctype="multipart/form-data">
  <?php  } ;?>
    <main>
      <img id="preview">
      <input type="file" name ="file" onchange="updatefiles(event)">
      <input type="submit" value="送信" id="submit" >
      <a href="./index.php" id="back">戻る</a>
    </main>
  </form>
  
</body>
</html>