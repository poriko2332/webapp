<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../index.css">
  <title>Bet Turn</title>
</head>

<body>
  <div class="title">
    <?php

    $bet = 0;   //プレイヤーが選択した賭け金額
    //タイトルから遷移されたときの初期化処理
    //bet(自分の持ち金)が未定義なら勝率と一緒に初期化する
    //もしmoneyが0以下ならゲーム終了、index.phpへの遷移を促す
    if (!isset($_POST["money"])) {
      $money = 500;   //プレイヤー持ち金
      $win = 0;
      $lose = 0;
    } else {
      $money = $_POST["money"];
      $win = $_POST["win"];
      $lose = $_POST["lose"];
    }
    if ($money == 0) {
      echo "<h1>ゲームオーバー!!</h1>";
      echo "<p>今回のあなたの戦績 => 勝ち: $win 負け: $lose</p>";
      echo "<form action='../index.php' method='POST'>";
      echo "<input type='submit' value='タイトルへ戻る'></form>";
    } else {
      echo "<h1>賭け金選択</h1>";
      echo "<p>現在のあなたの持ち金 => $money<br></p>";
      echo "<p>現在のあなたの戦績 => 勝ち: $win 負け: $lose</p>";
      echo "<form action='player.php' method='POST'>";
      echo "<input type='number' value='100' min='100' max='$money' step='50' name='bet'>";
      echo "<input type='submit' value='賭け金決定!'>";
      // <!-- <input type='hidden' value=$bet name='bet'> -->
      echo "<input type='hidden' value='$money' name='money'>";
      echo "<input type='hidden' value='$win' name='win'>";
      echo "<input type='hidden' value='$lose' name='lose'>";
    }
    ?>
    </form>
  </div>
</body>

</html>