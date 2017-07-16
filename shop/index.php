<meta charset="UTF-8">
<?php
    require_once './../conf/const.php';
    // 関数ファイル読み込み
    require_once './../model/common.php';
  $pdo = connect();
  $st = $pdo->query("SELECT * FROM goods");
  $goods = $st->fetchAll();
  require 't_index.php';
?>