<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<!-- 日付から曜日を算出します -->
<h3>19〇〇年以降の曜日を算出します。日付を入力してください。</h3>
<form action="index.php" method="post">
  <input type="text" name="year">
  <br>
  <input type="text" name="month">
  <br>
  <input type="text" name="day">
  <br>
  <br>
  <input type="submit" name="send">
</form>


  <?php
  $year = $_POST['year'];
  $month = $_POST['month'];
  $day = $_POST['day'];

  // モジュロ演算にかける

    // B -クリア
  $raey = 2;
  $moj_B = substr($year, -$raey);
  $moj_B = $year % pow(10, $raey);

  // A -クリア
  $moj_A = floor($moj_B / 4);

  // C ークリア
  $moj_C = 0;
  if($month == 4 || $month == 7){
    $moj_C = 0;
  }elseif($month == 1 || $month == 10){
    $moj_C = 1;
  }elseif($month == 5){
    $moj_C = 2;
  }elseif($month == 8){
    $moj_C = 3;
  }elseif($month == 2 || $month == 3 || $month == 11){
    $moj_C = 4;
  }elseif($month == 6){
    $moj_C = 5;
  }else{
    $moj_C = 6;
  }

  // D ークリア
  $moj_D = $day;

  // E ークリア
  $moj_E = floor($_POST['year'] / 100);
  if ($moj_E == 19){
    $moj_E = 0;
  }else{
    $moj_E = 6;
  }


  $sum = $moj_A + $moj_B + $moj_C + $moj_D + $moj_E;
  $result = $sum % 7;

  // 表と照らし合わせる
  switch($result){
    case(0):
      echo "土曜日です。";
      break;
    case(1):
      echo "日曜日です。";
      break;
    case(2):
      echo "月曜日です。";
      break;
    case(3):
      echo "火曜日です。";
      break;   
    case(4):
      echo "水曜日です。";
      break;   
    case(5):
      echo "木曜日です。";
      break;
    case(6):
      echo "金曜日です。";
      break;
  }

  ?>

  </form>
</body>
</html>

