<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  ゲーム画面
  <?php
    require 'card.php';
    $hoge = new cardgenerator;
    print("<br>");
    $hoge->shuffle();

  ?>
</body>
</html>