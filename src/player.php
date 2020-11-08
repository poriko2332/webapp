<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Player Turn</title>
</head>

<body>
  <?php
  require 'card.php';

  //init
  $deck = [];                     //山札
  $count = 0;                     //山札を何枚消費したかのカウンター
  $player_score = 0;              //プレイヤーのハンド合計点
  $dealer_hand = [];              //ティーラーのハンド
  $player_hand = [];              //プレイヤーのハンド
  $money = $_POST["money"];       //プレイヤー持ち金
  $bet = $_POST["bet"];           //賭け金
  $win = $_POST["win"];           //プレイヤー勝ち数
  $lose = $_POST["lose"];         //プレイヤー負け数
  if(!isset($_POST["blackjack_chance"])){
    $blackjack_chance = 0;   //プレイヤー初回手札でブラックジャックかを判別
  } else {
    $blackjack_chance = $_POST["blackjack_chance"];
  }

  //ディーラーのハンドが定義済みならPOSTされている値で初期化
  //プレイヤーのヒット処理もここで行う
  if (isset($_POST["dealer_hand"])) {
    $deck = $_POST["deck"];
    $count = $_POST["count"];
    $dealer_hand = $_POST["dealer_hand"];
    $player_hand = $_POST["player_hand"];

    //ヒット
    $count++;
    $player_hand[] = $deck[$count];
  }

  //山札とプレイヤー、ディーラーの初期手札を決定
  if (!isset($_POST["deck"])){
    $deck = cardgenerate();
    for ($i = 0; $i <= 1; $i++) {
      $dealer_hand[$i] = $deck[$count];
      $count++;
    }
    for ($i = 0; $i <= 1; $i++) {
      $player_hand[$i] = $deck[$count];
      $count++;
    }
  }

  print_r($deck);

  //ディーラーのハンド情報の表示
  echo "ディーラーのハンドは<br>"; 
  echo $dealer_hand[0], " <br>**<br>";
  
  //プレイヤーのハンド情報の表示、持ち札分繰り返す
  echo "あなたのハンドは<br>";
  for($i = 0; $i < count($player_hand); $i++) {
    echo $player_hand[$i], "<br>";
  }
  echo "あなたの合計値";
  $player_score = convert($player_hand);
  print($player_score);

  //echo print_r($deck->card), "<br>", print_r($dealer_hand), "<br>", print_r($player_hand);
  ?>
  <?php
    //バースト処理
    //初期手札で21ならブラックジャック、bet * 1.5でプレイヤー勝利
    //21以下ならヒット、ステイボタン表示
    if($player_score == 21 && $blackjack_chance == 0){
      echo "!!ブラックジャック!!<br>";
      echo "WIN ". ($bet * 2.5). "<br>";
      echo "あなたの勝ちです!<br>";
      echo "<form action='bet.php' method='POST'>";
      echo "<input type='submit' value='賭け金選択に戻る'>";
      echo "<input type='hidden' value=" . ($money + $bet * 2.5) . " name='money'>";
      echo "<input type='hidden' value=" . ($win + 1) . " name='win'>";
      echo "<input type='hidden' value=" . $lose . " name='lose'>";
      echo "</form>";
    } else if($player_score <= 21) {
      //ヒットボタン処理
      echo "<form action='player.php' method='POST'>";
      echo "<input type='submit' value='ヒット'>";
      echo "<input type='hidden' name='count' value=". $count. ">";
      for($i = 0; $i < count($dealer_hand); $i++) {
        echo "<input type='hidden' name='dealer_hand[]' value=". $dealer_hand[$i]. ">";
      }
      for ($i = 0; $i < count($player_hand); $i++) {
        echo "<input type='hidden' name='player_hand[]' value=" . $player_hand[$i] . ">";
      }
      for ($i = 0; $i < count($deck); $i++) {
        echo "<input type='hidden' name='deck[]' value=" . $deck[$i] . ">";
      }
      echo "<input type='hidden' value=" . $money . " name='money'>";
      echo "<input type='hidden' value=". $bet. " name='bet'>";
      echo "<input type='hidden' value=" . $win . " name='win'>";
      echo "<input type='hidden' value=" . $lose . " name='lose'>";
      echo "<input type='hidden' value='1' name='blackjack_chance'>";
      echo "</form>";
      
      //ステイボタン処理
      echo "<form action='dealer.php' method='POST'>";
      echo "<input type='submit' value='ステイ'>";
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
      echo "<input type='hidden' value='0' name='hit_flag'>"; 
      echo "</form>";

    } else {
      echo "バースト!!";
      echo "<form action='bet.php' method='POST'>";
      echo "<input type='submit' value='賭け金選択に戻る'>";
      echo "<input type='hidden' value=". ($money - $bet). " name='money'>";
      echo "<input type='hidden' value=". $win. " name='win'>";
      echo "<input type='hidden' value=". ($lose + 1). " name='lose'>";
      echo "</form>";
    }
  ?>
  </form>
</body>

</html>