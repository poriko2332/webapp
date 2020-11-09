<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bet Time</title>
</head>

<body>
  <?php
  //タイトルから遷移されたときの初期化処理
  //bet(自分の持ち金)が未定義なら勝率と一緒に初期化する
  if (!isset($_POST["bet"])) {
    $bet = 500;
    $win = 0;
    $lose = 0;
  }
  ?>
  <h1>賭け金選択</h1>
  <p>現在のあなたの持ち金 => <?php echo $bet ?><br></p>
  <p>現在のあなたの戦績 => <?php echo "勝ち: ", $win, " 負け: ", $lose ?></p>
  <form action="player.php" method="POST">
    <input type="number" value="10" min="10" max="<?php echo $bet; ?>" step="10"> 
    <input type="submit" value="賭け金決定!">
  </form> 
</body> 
</html>