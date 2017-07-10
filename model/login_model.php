<?php

//################################################################//
//各テーブルの処理
//################################################################//

/**
* 特殊文字をHTMLエンティティに変換する
* @param str  $str 変換前文字
* @return str 変換後文字
*/
function entity_str($str) {

  return htmlspecialchars($str, ENT_QUOTES, HTML_CHARACTER_SET);
}

/**
* 特殊文字をHTMLエンティティに変換する(2次元配列の値)
* @param array  $assoc_array 変換前配列
* @return array 変換後配列
*/
function entity_assoc_array($assoc_array) {
  
  foreach ($assoc_array as $key => $value) {
    foreach ($value as $keys => $values) {
      // 特殊文字をHTMLエンティティに変換
      $assoc_array[$key][$keys] = entity_str($values);
    }
  }

  return $assoc_array;
}

/**
* DBハンドルを取得
* @return obj $dbh DBハンドル
*/
function get_db_connect() {

  try {
    // データベースに接続
    $dbh = new PDO(DSN, DB_USER, DB_PASSWD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  } catch (PDOException $e) {
    echo '接続できませんでした。理由：'.$e->getMessage();
  }

  return $dbh;
}