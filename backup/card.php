<?php
  class cardgenerator {

    public $card = [];

    //コンストラクター
    //0~51の範囲で配列を確保、各数字+1で自分のトランプのナンバーに対応
    function __construct(){
      for ($i = 0; $i <= 51; $i++){
        $this->card[] = $i; 
      }
      //print_r($this->card);
    }

    //山札のシャッフル
    //i番目のカードを$rand番目と入れ替える
    function shuffle(){
      for ($i = 0; $i <= 51; $i++){
        $rand = rand(0, 51);          //入れ替え先の決定
        $tmp = $this->card[$i];       //置き換え先の変数を一時保存
        $this->card[$i] = $this->card[$rand];
        $this->card[$rand] = $tmp;
      }
      //print_r($this->card);
    }
  }

  //カード情報の変換
  //数字を本来の数字へ変換(A => 1 or 11, JQK => 10)
  function convert($cnv)
  {
    $result = [];
    for ($i = 0; $i < count($cnv); $i++) {

      //JQKだったときの処理、全て10に変換
      if ($cnv[$i] % 13 == 11 || $cnv[$i] % 13 == 12 || $cnv[$i] % 13 == 13) {
        $result[$i] = 10;
      }
    }
    return $result;
  }
?>