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

  //山札を何枚消費したかのカウンター
  $count = 0;
  $player_score = [];

  //プレイヤー、ディーラーの手札
  $dealer_hand = [];
  $player_hand = [];

  //山札の生成

  //ディーラーのハンドが定義済みならPOSTされている値で初期化
  if (isset($_POST["dealer_hand"])) {
    //山札を何枚消費したかのカウンター
    $count = 0;
    $player_score = [];

    $dealer_hand = [];
    $player_hand = [];

    $deck = new cardgenerator();
    $deck->shuffle();

    //プレイヤー、ディーラーの初期手札を決定
    for ($i = 0; $i <= 1; $i++) {
      $dealer_hand[$i] = $deck->card[$count];
      $count++;
    }
    for ($i = 0; $i <= 1; $i++) {
      $player_hand[$i] = $deck->card[$count];
      $count++;
    }
  }

  //プレイヤー、ディーラーの初期手札を決定
  for ($i = 0; $i <= 1; $i++) {
    $dealer_hand[$i] = $deck->card[$count];
    $count++;
  }
  for ($i = 0; $i <= 1; $i++) {
    $player_hand[$i] = $deck->card[$count];
    $count++;

  //ディーラーのハンド情報の表示
  echo "ディーラーのハンドは<br>"; 
  echo $dealer_hand[0], " <br>**<br>";
  
  //プレイヤーのハンド情報の表示、持ち札分繰り返す
  echo "プレイヤーのハンドは<br>";
  for($i = 0; $i < count($player_hand); $i++) {
    echo $player_hand[$i], "<br>";
  }
  echo "合計値";
  $player_score = convert($player_hand);

  //echo print_r($deck->card), "<br>", print_r($dealer_hand), "<br>", print_r($player_hand);

  ?>
</body>

</html>