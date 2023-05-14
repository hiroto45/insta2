<?php
  include('./header.php');
  include('./getsData.php');

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="main-form">
    <div class="image-update-delete">
       <img src="./img/<?php echo $data['QueryImageId']['file_name']; ?>" alt="画像">
       <div class="update-delete">
         <button id="update" onclick ="location.href ='./postImageform.php?id=<?php echo $_GET['id'] ;?>';" >更新</button>
         <button id="delete" onclick ="location.href = './deleteImage.php?id=<?php echo $_GET['id'] ; ?>';">削除</button>
       </div>
       <a href="./index.php" id="back">戻る</a>
    </div>
    <div class="comment">
      <h1>コメント</h1>
      <ul>
        <?php foreach($data['comments'] as $comment) :?>
        <li><?php echo $comment['comment']; ?></li>
        <?php  endforeach ; ?>
      </ul>
      <form action ="./comment.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <textarea name="comment"  cols="30" rows="10"></textarea>
        <input type="submit" value="送信" id="submit" name="submit" class="submit">
      </form>
    </div>

  </div>
  
</body>
</html>