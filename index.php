<?php
 include('./header.php') ;
 include('./getsData.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Instagram</title>
</head>
<body>
  <section class="home">
    <ul>
      <?php foreach($data as $image): ?>
     <li ><a href="ImageDetail.php?id=<?php echo $image['id']; ?>"><img src="./img/<?php echo $image['file_name'] ?>" alt="画像"></a></li>
     <?php endforeach; ?>
    </ul>
  </section>
  
</body>
</html>