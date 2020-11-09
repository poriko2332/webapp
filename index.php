<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link href="index.css" rel="stylesheet">
  <link href="card_pic.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BlackJack</title>
</head>

<?php
require './src/card.php';
?>

<body>
  <div class="title">
    <h1>ブラックジャック</h1>
    <div class="container">
      <?php
      for ($i = 0; $i < 5; $i++) {
        $rand = rand(0, 51);
        $hoge = CnvToPic($rand);
        echo $hoge;
      }
      ?>
    </div>
    <a href="./rule.php">
      <h2>ルール説明</h2>
    </a>
    <a href="./src/bet.php">
      <h1>ゲームスタート!</h1>
    </a>
    <div class="container">
      <?php
      for ($i = 0; $i < 5; $i++) {
        $rand = rand(0, 51);
        $hoge = CnvToPic($rand);
        echo $hoge;
      }
      ?>
    </div>
  </div>
</body>

</html>