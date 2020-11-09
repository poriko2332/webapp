<?php
  //0~51の範囲で配列を確保、各数字+1で自分のトランプのナンバーに対応
  function cardgenerate(){
    $card = [];
    for ($i = 0; $i <= 51; $i++){
      $card[] = $i; 
    }

    //山札のシャッフル
    for ($i = 0; $i <= 51; $i++) {
      $rand = rand(0, 51);          //入れ替え先の決定
      $tmp = $card[$i];       //置き換え先の変数を一時保存
      $card[$i] = $card[$rand];
      $card[$rand] = $tmp;
    }
    return $card;
  }

  //カード情報の変換、数字の合計を算出
  //数字を本来の数字へ変換(A => 1, JQK => 10)
  function convert($cnv){
    $result = 0;
    for ($i = 0; $i < count($cnv); $i++) {
      //JQKだったときの処理、全て10に変換
      if ($cnv[$i] % 13 == 10 || $cnv[$i] % 13 == 11 || $cnv[$i] % 13 == 12) {
        $result += 10;
      } else {
        $result += $cnv[$i] % 13 + 1;    //本来の数字に対応させるために+1
      }
    }
    return $result;
  }

  /*
  //Aを11として扱ったときの手札の合計値
  function convert_includeA($cnv){
    $result = 0;
    $ACount = 0;    //Aが2回以上でたときに、2回目からは1として扱うための変数
    for ($i = 0; $i < count($cnv); $i++) {
      //JQKだったときの処理、全て10に変換
      if ($cnv[$i] % 13 == 10 || $cnv[$i] % 13 == 11 || $cnv[$i] % 13 == 12) {
        $result += 10;
      } else if ($cnv[$i] % 13 == 0 && $ACount == 0) {
        $ACount++;
        $result += 11;
      } else {
        $result += $cnv[$i] % 13 + 1;    //本来の数字に対応させるために+1
      }
    }
    return $result;
  }
  */

  //カードの表面の画像を、カードナンバーに対応させて出力する
  //素材画像のトランプが精密な大きさではないのでadujstで正確な位置に合わせなければ正しく表示されない
  //divタグで出力、cssの変数を数字に合わせて変更する
  function CnvToPic($number) {
    $a = 0;
    $tmp = $number % 13;    //カードナンバーを算出
    if($tmp >=0 && $tmp <= 1){
      $adjust = 0;
    } else if($tmp >= 1 && $tmp <= 7){
      $adjust = 1;
    } else if($tmp >= 8) {
      $adjust = 2;
    } else {
      $adjust = 3;
    }
    $a = -93 * $tmp + $adjust;

    //スート事に画像変更
    if($number < 13) {
      return "<div class='card' style='background-position: $a". "px 0px;'></div>";
    } else if($number < 26) {
      return "<div class='card' style='background-position: $a" . "px -146px;'></div>";
    } else if($number < 37) {
      return "<div class='card' style='background-position: $a" . "px -291px;'></div>";
    } else {
      return "<div class='card' style='background-position: $a" . "px -437px;'></div>";
    } 
  }

  //Aと数字部分の処理
  function convert_includeA($hand) {
    rsort($hand);
    $tmp = 0;
    $A = 0;
    $sum = 0;
    for($i = 0; $i < count($hand); $i++){
      $tmp = $hand[$i] % 13;
      if ($tmp % 13 == 10 || $tmp % 13 == 11 || $tmp % 13 == 12) {
        $sum += 10;
      } else if($tmp == 0) {
        $A++;
      } else {
        $sum += $tmp + 1;
      }
    }
    if($sum >= 11) {    //数字部分で既に11以上ならAは必ず1にする
      $sum += $A * 1;
    } else if($A >= 1) {
      $sum += 11 + ($A - 1) * 1;  //A=11を入れてもバーストしない且つAが2枚あるならAは1つのみ11
    }
    return $sum;
  }
?>