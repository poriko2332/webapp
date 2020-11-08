<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="card_pic.css">
  <title>Document</title>
</head>
<body>
  <?php
    require './src/card.php';
    for($i = 0; $i < 52; $i++){
      $hoge = CnvToPic($i);
      echo $hoge;
    }
    
  ?>
</body>
</html>