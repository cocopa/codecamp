<?php
echo 'logout';


    // セッションの開始
    session_start();
    // セッション変数の初期化
    $_SESSION = array();
    // セッションファイルの削除
    session_destroy();
    if (empty($_POST["cookie_delete"])) {
      if ( !isset($_COOKIE['visit_log']) ){
          // 送られてきた非表示データに応じて処理を振り分けます。
        // Cookieを削除する
        $now = time();
        setcookie('visitLog', '', $now - 3600);
        echo'削除しました';
      }else {
        echo'失敗。';
        
      }
    }else{
      echo'失敗１';
      
    }





