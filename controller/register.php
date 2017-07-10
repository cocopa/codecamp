<?php
    // 設定ファイル読み込み
    require_once './../conf/const.php';
    // 関数ファイル読み込み
    require_once './../model/common.php';
    $request_method=get_request_method();
    
    // セッションの開始
    session_start();
    
    
    if ($request_method === 'POST') {
        try {
            //バリデーション
            
            if (count($err_msg) === 0 ){
                $dbh = get_db_connect();
                
            }
            
            
            
        
        } catch (Exception $e) {
          $err_msg[] = $e->getMessage();
        }
    }
    include_once './../view/register_view.php';
    
    

