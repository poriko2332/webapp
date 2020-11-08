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
  //数字を本来の数字へ変換(A => 1 or 11, JQK => 10)
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
?>