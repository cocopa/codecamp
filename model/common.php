<?php

// セッションの開始

//################################################################//
//各テーブルの処理
//################################################################//

  function connect() {
    try {
      // データベースに接続
      $dbh = new PDO("mysql:dbname=rentaladviser", DB_USER, DB_PASSWD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e) {
      echo '接続できませんでした。理由：'.$e->getMessage();
    }
    return $dbh;
    
    
  }

  function img_tag($code) {
    if (file_exists(img_dir.$code)) $name = $code;
    else $name = 'user.png';
    return '<img src='.img_dir.$name. " width=80px".'>';
  }
//################################################################//
//DBを利用する関数
//################################################################//

/*--------------------------------------------------*
* 特殊文字をHTMLエンティティに変換する
* @param str  $str 変換前文字
* @return str 変換後文字
--------------------------------------------------**/
function entity_str($str) {

  return htmlspecialchars($str, ENT_QUOTES, HTML_CHARACTER_SET);
}

/*--------------------------------------------------*
* 特殊文字をHTMLエンティティに変換する(2次元配列の値)
* @param array  $assoc_array 変換前配列
* @return array 変換後配列
--------------------------------------------------**/
function entity_assoc_array($assoc_array) {
  
  foreach ($assoc_array as $key => $value) {
    foreach ($value as $keys => $values) {
      // 特殊文字をHTMLエンティティに変換
      $assoc_array[$key][$keys] = entity_str($values);
    }
  }

  return $assoc_array;
}


/*--------------------------------------------------*
* DBハンドルを取得
* @return obj $dbh DBハンドル
--------------------------------------------------**/
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


/*--------------------------------------------------*
* DBクローズ
--------------------------------------------------**/
function close_db_connect($dbh) {
    // 接続を閉じる
    $dbh->close();
}


/*--------------------------------------------------*
* リクエストメソッド
--------------------------------------------------**/
function get_request_method() {
    return $_SERVER['REQUEST_METHOD'];
}



/*--------------------------------------------------*
\* POSTデータを取得
\* @param str $key 配列キー
\* @return str POST値
--------------------------------------------------**/
function get_post_data($key) {
    $str = '';
    if (isset($_POST[$key]) === TRUE) {
        $str = $_POST[$key];
    }
    return $str;
}
/*--------------------------------------------------***
* sqlを呼び出す
*
--------------------------------------------------**/
function call_sql($dbh, $sql) {
  try {
    // SQL文を実行する準備
    $stmt = $dbh->prepare($sql);
    // SQLを実行
    $stmt->execute();
    // レコードの取得
    $rows = $stmt->fetchAll();
  } catch (PDOException $e) {
   echo '接続できませんでした。理由：'.$e->getMessage();
  }

  return $rows;
}


//################################################################//
//バリデーション関連
//DB未使用
//################################################################//


/*--------------------------------------------------*
* 画像アップロード前処理
*
--------------------------------------------------**/
function upload_for_img($err_msg){

    //戻り値用の変数を準備

    $file_contents = '';
    $new_img_filename = '';

    if (is_uploaded_file($_FILES['new_img']['tmp_name']) === TRUE) {
      // 画像の拡張子を取得
      $extension = pathinfo($_FILES['new_img']['name'], PATHINFO_EXTENSION);
      // 指定の拡張子であるかどうかチェック
      $extension = strtolower($extension);
      if ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png'
       || $extension === 'JPEG'  || $extension === 'PNG') {
        // 保存する新しいファイル名の生成（ユニークな値を設定する）
        $new_img_filename = sha1(uniqid(mt_rand(), true)). '.' . $extension;
        // 同名ファイルが存在するかどうかチェック
        if (is_file(img_dir . $new_img_filename) !== TRUE) {
          // アップロードされたファイルを指定ディレクトリに移動して保存
          if (move_uploaded_file($_FILES['new_img']['tmp_name'], img_dir . $new_img_filename) !== TRUE) {
              $err_msg[] = 'ファイルアップロードに失敗しました';
          }
        } else {
          $err_msg[] = 'ファイルアップロードに失敗しました。再度お試しください。';
        }
      } else {
        $err_msg[] = 'ファイル形式が異なります。画像ファイルはJPEG,pngのみ利用可能です。';
      }
      
      
    } else {
      $err_msg[] = 'ファイルを選択してください';
    }

    $return_file = ['img' => $file_contents , 'new_img_filename' => $new_img_filename , 'err_message' => $err_msg];
    return $return_file;
}
/*--------------------------------------------------*
* 名称バリデーション
*
--------------------------------------------------**/
function validate_name($name,$content,$err_message){
    
    if (mb_strlen($name) > 20 ){
        $err_message[] = $content  .'に名前は20文字以内で入力してください ';
    }else if(mb_strlen($name) === 0 ){
        $err_message[] = $content  .'を入力してください';
    }
    
    return $err_message;
}


/*--------------------------------------------------*
* 数バリデーション
*
--------------------------------------------------**/
function validate_num($number,$content,$err_message){
    
 
    $pattern = '/^([1-9][0-9]*|0)$/';

    if(is_numeric($number) === false ){
        $err_message[] = $content  . 'に値を入力してください';
    }else{
        if (preg_match($pattern,$number) === 0 ){
            $err_message[] = $content  .'には整数にて入力してください';
        }
        if($number < 0 ){
            $err_message[] = $content  .'には0以上の値を入力してください';
        }
    }
    return $err_message;
}
