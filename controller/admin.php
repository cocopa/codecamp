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
            
            $user = get_post_data('user');
            $password = get_post_data('password');
            $user_area  = get_post_data('user_area');
            //$user_category      = get_post_data('user_category');
            $user_category = '1';
            $user_status = get_post_data('user_status');
            $status     = get_post_data('status');
            $review = get_post_data('review');
            $update_date = date("Y-m-d H:i:s");
            $date = date("Y-m-d H:i:s");            
            //echo $user_id.$user.$password.$user_area;
            //バリデーション
            validate_name($user,'ユーザ名',$err_msg);
           
            $tmp=upload_for_img($err_msg);
            $err_msg = $tmp['err_message'];
            if (count($err_msg) === 0 ){
                $dbh = get_db_connect();
                
                insert_users_table($dbh, $user, $password,$user_area,$user_category,$status,$update_date,$tmp['new_img_filename']);
                print "<h2>".$user."追加しました</h2>";
                
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
    
    
    include_once './../view/admin_view.php';
    
    

