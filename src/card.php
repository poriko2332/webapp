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
?>