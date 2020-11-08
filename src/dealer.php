<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dealer Turn</title>
</head>
<body>
  <?php
    //init
    require 'card.php';
    $deck = $_POST["deck"];                     //山札
    $count = $_POST["count"];                   //山札を何枚消費したかのカウンター
    $player_score = $_POST["player_score"];     //プレイヤーのハンド合計点
    $dealer_hand = $_POST["dealer_hand"];       //ティーラーのハンド
    $dealer_score = 0;                          //ディーラーの合計点
    $player_hand = $_POST["player_hand"];       //プレイヤーのハンド
    $money = $_POST["money"];                   //プレイヤー持ち金
    $bet = $_POST["bet"];                       //賭け金
    $win = $_POST["win"];                       //プレイヤー勝ち数
    $lose = $_POST["lose"];                     //プレイヤー負け数
    $hit_flag = $_POST["hit_flag"];    //初回はディーラーのヒットをさせない(演出のため)

    //ディーラーのヒット処理 ステイからの遷移からのみ行わない
    if($hit_flag == 1){
      $count++;
      $dealer_hand[] = $deck[$count];
    }

    //ディーラーの手の表示
    echo "ディーラのハンドは<br>";
    for($i = 0; $i < count($dealer_hand); $i++){
      echo $dealer_hand[$i] . "<br>";
    }
    echo "ディーラー合計値";
    $dealer_score = convert($dealer_hand);
    echo $dealer_score . "<br>";

    //プレイヤーの手の表示
    echo "あなたのハンドは<br>";
    for ($i = 0; $i < count($player_hand); $i++) {
      echo $player_hand[$i], "<br>";
    }
    echo "あなたの合計値";
    $player_score = convert($player_hand);
    print($player_score);

    //プレイヤーのスコアと比較
    //ディーラーのスコアが22以上でない且つプレイヤーより合計点が多い
    if( !($dealer_score > 21) && ($dealer_score > $player_score) ) {
      echo "<br>あなたの負けです!";
      echo "<form action='bet.php' method='POST'>";
      echo "<input type='submit' value='賭け金選択に戻る'>";
      echo "<input type='hidden' value=" . ($money - $bet) . " name='money'>";
      echo "<input type='hidden' value=" . $win . " name='win'>";
      echo "<input type='hidden' value=" . ($lose + 1) . " name='lose'>";
      echo "</form>";
    } else if($dealer_score > 21 || ($dealer_score > 16 && $dealer_score < $player_score)){
      echo "<br>あなたの勝ちです!<br>";
      echo "WIN " . ($bet * 2) . "<br>";
      echo "<form action='bet.php' method='POST'>";
      echo "<input type='submit' value='賭け金選択に戻る'>";
      echo "<input type='hidden' value=" . ($money + $bet * 2) . " name='money'>";
      echo "<input type='hidden' value=" . ($win + 1) . " name='win'>";
      echo "<input type='hidden' value=" . $lose . " name='lose'>";
      echo "</form>";
    } else if($dealer_score > 21 || ($dealer_score > 16 && $dealer_score == $player_score)){
      echo "<br>引き分けです!<br>";
      echo "WIN 0<br>";
      echo "<form action='bet.php' method='POST'>";
      echo "<input type='submit' value='賭け金選択に戻る'>";
      echo "<input type='hidden' value=" . $money . " name='money'>";
      echo "<input type='hidden' value=" . $win . " name='win'>";
      echo "<input type='hidden' value=" . $lose . " name='lose'>";
      echo "</form>";
    } else {
      //ディーラーのヒット
      echo "<form action='dealer.php' method='POST'>";
      echo "<input type='submit' value='ディーラーのヒット'>";
      echo "<input type='hidden' name='count' value=" . $count . ">";
      for ($i = 0; $i < count($dealer_hand); $i++) {
        echo "<input type='hidden' name='dealer_hand[]' value=" . $dealer_hand[$i] . ">";
      }
      for ($i = 0; $i < count($player_hand); $i++) {
        echo "<input type='hidden' name='player_hand[]' value=" . $player_hand[$i] . ">";
      }
      for ($i = 0; $i < count($deck); $i++) {
        echo "<input type='hidden' name='deck[]' value=" . $deck[$i] . ">";
      }
      echo "<input type='hidden' value=" . $player_score . " name='player_score'>";
      echo "<input type='hidden' value=" . $money . " name='money'>";
      echo "<input type='hidden' value=" . $bet . " name='bet'>";
      echo "<input type='hidden' value=" . $win . " name='win'>";
      echo "<input type='hidden' value=" . $lose . " name='lose'>";
      echo "<input type='hidden' value='1' name='hit_flag'>";
      echo "</form>";
    }



  ?>
</body>
</html>