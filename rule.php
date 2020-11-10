<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/rule.css">
  <link rel="stylesheet" href="./css/card_pic.css">
  <title>ルール説明</title>
</head>

<?php require './src/card.php'; ?>

<body>
  <div class="rule">
    <h1>ルール説明</h1>
    <hr>
    <h2>ブラックジャックとは?</h2>
    <p>
      ディーラとあなたとの1対1で対戦をするトランプゲームです。<br>
      このゲームの目的は、手持ちのカードの数字の合計が「21」を超えない範囲で
      「21」に近い数字を作ることです。
    </p>
    <h2>カードの数え方</h2>
    <p>
      ブラックジャックでは、カードの数え方に一部例外があります。
      一つは「Jack」「Queen」「King」です。
    </p>
    <div class="container">
      <?php
      for ($i = 10; $i < 13; $i++) {
        $hoge = CnvToPic($i);
        echo $hoge;
      }
      ?>
    </div>
    <p>
      これらのカードは全て(スートに関係なく)「10」で数えます。
    </p>
    <p>
      もう一つは「A」です。
    </p>
    <div class="container">
      <?php
      for ($i = 0; $i < 40; $i += 13) {
        $hoge = CnvToPic($i);
        echo $hoge;
      }
      ?>
    </div>
    <p>
      「A」は「1」としても「11」としても数えることができるカードです。<br>
      自分の有利になるように数えることができます。
    </p>
    <h2>ゲームの流れ</h2>
    <h3>①カードの配布</h3>
    <p>
      ディーラーとあなたにカードが2枚配られます。<br>
      このとき、ディーラーのカードは1枚裏面になり、あなたが手を確定するまで見ることはできません。
    </p>
    <div class="example">
      <div class="rule_dealer">
        <p>ディーラー</p>
        <div class="container">
          <?php
          $hoge = CnvToPic(5);
          echo $hoge;
          echo "<div class='card' style='background-position: -185px -583px;'></div>";
          ?>
        </div>
      </div>
      <div class="rule_player">
        <p>あなた</p>
        <div class="container">
          <?php
          $hoge = CnvToPic(43);
          echo $hoge;
          $hoge = CnvToPic(23);
          echo $hoge;
          ?>
        </div>
      </div>
    </div>
    <h3>②ヒットかスタンドか</h3>
    <p>
      あなたは配られたカードとディーラーの手から「ヒット」か「スタンド」を判断します。<br>
      「ヒット」とは、カードを1枚補充すること。<br>
      「スタンド」とは、手の決定のことを意味します。<br>
      もし「ヒット」をして、手持ちの数字が「21」を超えてしまった場合は「バースト」となりあなたの負けとなります。
    </p>
    <div class="rule_player">
      <p>例</p>
      <div class="container">
        <?php
        $hoge = CnvToPic(7);
        echo $hoge;
        $hoge = CnvToPic(34);
        echo $hoge;
        $hoge = CnvToPic(11);
        echo $hoge;
        ?>
      </div>
      <p>8 + 9 + 10 = 27 なので「バースト」</p>
    </div>
    <p>
      「スタンド」を選択した場合は、今の手で確定し、ディーラーに番を渡します。<br>
      ここでは例として、あなたは「ヒット」を行い「5」を引いて「スタンド」したとして話を進めます。
    </p>
    <h3>③ディーラーのヒット</h3>
    <p>
      ディーラーに番が渡ると、まずは裏側になっていたカードが公開されます。
    </p>
    <div class="example">
      <div class="rule_dealer">
        <p>ディーラー</p>
        <div class="container">
          <?php
          $hoge = CnvToPic(5);
          echo $hoge;
          $hoge = CnvToPic(28);
          echo $hoge;
          ?>
        </div>
      </div>
      <div class="rule_player">
        <p>あなた</p>
        <div class="container">
          <?php
          $hoge = CnvToPic(43);
          echo $hoge;
          $hoge = CnvToPic(23);
          echo $hoge;
          $hoge = CnvToPic(30);
          echo $hoge;
          ?>
        </div>
      </div>
    </div>
    <p>
      次にディーラーは「手持ちの数字の合計が17以上になるまで」は「必ず」ヒットを行います。<br>
      この「17以上になるまでは必ずヒットを行う」というルールは、ブラックジャックにおける最重要項目です。<br>
      今回、ディーラーの現状の合計点は 6 + 3 = 9 なので「ヒット」を行います。
    </p>
    <div class="example">
      <div class="rule_dealer">
        <p>ディーラー</p>
        <div class="container">
          <?php
          $hoge = CnvToPic(5);
          echo $hoge;
          $hoge = CnvToPic(28);
          echo $hoge;
          $hoge = CnvToPic(45);
          echo $hoge;
          ?>
        </div>
      </div>
      <div class="rule_player">
        <p>あなた</p>
        <div class="container">
          <?php
          $hoge = CnvToPic(43);
          echo $hoge;
          $hoge = CnvToPic(23);
          echo $hoge;
          $hoge = CnvToPic(30);
          echo $hoge;
          ?>
        </div>
      </div>
    </div>
    <p>
      ディーラーは「ヒット」を行った結果「7」を引きました。合計点は「16」です。<br>
      このままではバーストの危険性が高いですが、<br>
      「17以上になるまでは必ずヒットを行う」<br>
      「17以上になったら必ずスタンドする」<br>
      というルールに基づき「ヒット」を行います。
    </p>
    <div class="example">
      <div class="rule_dealer">
        <p>ディーラー</p>
        <div class="container">
          <?php
          $hoge = CnvToPic(5);
          echo $hoge;
          $hoge = CnvToPic(28);
          echo $hoge;
          $hoge = CnvToPic(45);
          echo $hoge;
          $hoge = CnvToPic(51);
          echo $hoge;
          ?>
        </div>
      </div>
      <div class="rule_player">
        <p>あなた</p>
        <div class="container">
          <?php
          $hoge = CnvToPic(43);
          echo $hoge;
          $hoge = CnvToPic(23);
          echo $hoge;
          $hoge = CnvToPic(30);
          echo $hoge;
          ?>
        </div>
      </div>
    </div>
    <p>
      「ヒット」を行った結果、「10」を引いてしまったため合計点は「26」になりました。<br>
      このとき、ディーラーは「バースト」となり、ディーラーの負け、あなたの勝ちが確定しました。
    </p>
    <hr>
    <p>
      少し話を戻しまして、3回目のヒットのときに「5」を引いたとします。
    </p>
    <div class="example">
      <div class="rule_dealer">
        <p>ディーラー</p>
        <div class="container">
          <?php
          $hoge = CnvToPic(5);
          echo $hoge;
          $hoge = CnvToPic(28);
          echo $hoge;
          $hoge = CnvToPic(45);
          echo $hoge;
          $hoge = CnvToPic(17);
          echo $hoge;
          ?>
        </div>
      </div>
      <div class="rule_player">
        <p>あなた</p>
        <div class="container">
          <?php
          $hoge = CnvToPic(43);
          echo $hoge;
          $hoge = CnvToPic(23);
          echo $hoge;
          $hoge = CnvToPic(30);
          echo $hoge;
          ?>
        </div>
      </div>
    </div>
    <p>
      この時、ディーラーの合計点は「21」、一方あなたの合計点は「20」です。<br>
      ディーラーは合計点が「17以上」なので「ヒット」は行わず「スタンド」をします。<br>
      ブラックジャックは「手持ちのカードの数字の合計が「21」を超えない範囲で「21」に近い数字を作ること」<br>
      が目的です。この場合ディーラーの方が「21」に近いためディーラーの勝ち、あなたの負けとなります。
    </p>
    <hr>
    <p>
      もし「6」を引いていたとしたら、同点の「21」となり、この場合は「引き分け」となります。
    </p>
    <h3>④特殊な役と払い戻しについて</h3>
    <h4>特殊な役「ブラックジャック」</h4>
    <p>
      「ブラックジャック」とは、最初にカードが配られたときに<br>
      「A」と「10」で合計点が「21」で成立していたときに付く役のことです。<br>
      この時点であなたの勝ちが確定されます。<br>
      このとき、払い戻しは「賭けたお金 × 2.5」の額で払い戻されます。<br>
      「ヒット」を行い、合計点を「21」にしても、それはブラックジャックにはなりません。<br>
    </p>
    <p>
      普段の払い戻しは、ここでは「賭けたお金 × 1.5」の額で払い戻されます。<br>
      あなたの負けの場合は払い戻しは無し、引き分けのときは変動なしです。
    </p>
    <form action="./index.php" method="POST">
      <input type="submit" value="タイトルに戻る">
    </form>
  </div>
</body>

</html>