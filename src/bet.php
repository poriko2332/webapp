<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bet Turn</title>
</head>

<body>
  <?php

  $bet = 0;   //プレイヤーが選択した賭け金額
  //タイトルから遷移されたときの初期化処理
  //bet(自分の持ち金)が未定義なら勝率と一緒に初期化する
  if (!isset($_POST["money"])) {
    $money = 500;   //プレイヤー持ち金
    $win = 0;
    $lose = 0;
  } else {
    $money = $_POST["money"];
    $win = $_POST["win"];
    $lose = $_POST["lose"];
  }
  ?>
  <h1>賭け金選択</h1>
  <p>現在のあなたの持ち金 => <?php echo $money ?><br></p>
  <p>現在のあなたの戦績 => <?php echo "勝ち: ", $win, " 負け: ", $lose ?></p>
  <form action="player.php" method="POST">
    <input type="number" value="10" min="10" max="<?php echo $money; ?>" step="10" name="bet"> 
    <input type="submit" value="賭け金決定!">
    <!-- <input type="hidden" value="<?= $bet ?>" name="bet"> -->
    <input type="hidden" value="<?= $money ?>" name="money">
    <input type="hidden" value="<?= $win ?>" name="win">
    <input type="hidden" value="<?= $lose ?>" name="lose">
  </form> 
</body> 
</html>