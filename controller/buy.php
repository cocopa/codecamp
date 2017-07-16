<?php
    // 設定ファイル読み込み
    require_once './../conf/const.php';
    // 関数ファイル読み込み
    require_once './../model/common.php';
    require_once './../model/admin_model.php';
    $request_method=get_request_method();
    $msg = [];
    $err_msg = [];
    
    if ($request_method === 'POST') {
        try {
            
             // POST値取得
        
            if (count($err_msg) === 0 ){
                $dbh = get_db_connect();
                
                $msg[] = $user."購入しました。";
             }
            
            
            
        
        } catch (Exception $e) {
          $err_msg[] = $e->getMessage();
        }
    }
    
    if ($msg !== [] ){
        foreach ($msg as $value) {
                  $value = htmlspecialchars($value, ENT_QUOTES, HTML_CHARACTER_SET);
                  print $value."<br>"; 
         }
    }
    if ($err_msg !== [] ){
        foreach ($err_msg as $value) {
                  $value = htmlspecialchars($value, ENT_QUOTES, HTML_CHARACTER_SET);
                  print $value."<br>"; 
         }
    }
    
    
    include_once './../controller/itemlist.php';