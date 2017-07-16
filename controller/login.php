<?php
    // 設定ファイル読み込み
    require_once './../conf/const.php';
    // 関数ファイル読み込み
    require_once './../model/common.php';
    $user_name = '';
    $cookie_check='';
    $login_url = './../view/login_view.php';
    $err_msg    = [];
    
    $request_method=get_request_method();

    if ($request_method === 'POST') {
        
        try {
            //バリデーション
            
            $login_url = $_POST['form_type'];
            
            if (count($err_msg) === 0 ){
                $dbh = get_db_connect();
            }
            
            if ($login_url == null) {
                $login_url = './../view/login_view.php';
            }
        } catch (Exception $e) {
          $err_msg[] = $e->getMessage();
        }
    }
   
    foreach ($err_msg as $value) {
         print $value;
    } 
    
    include_once($login_url);
