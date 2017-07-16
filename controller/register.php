<?php
    // 設定ファイル読み込み
    require_once './../conf/const.php';
    // 関数ファイル読み込み
    require_once './../model/common.php';
    require_once './../model/register_model.php';
    
    $request_method=get_request_method();
    
    // セッションの開始
    session_start();
    
    $err_msg = [];
    if ($request_method === 'POST') {
        try {
            //バリデーション
            
             // POST値取得
            $id = get_post_data('user');
            $price  = get_post_data('price');
            $title = get_post_data('title');
            $comment = get_post_data('comment');
            $area = get_post_data('area');
            $category_id = get_post_data('category_id');
            $area = get_post_data('area');     
            $schedule = get_post_data('schedule');
            $status     = get_post_data('status');
            
            $date = date("Y-m-d H:i:s");
            //バリデーション
            $tmp=upload_for_img($err_msg);
            $err_msg = $tmp['err_message'];
            
            if (count($err_msg) === 0 ){
                $dbh = get_db_connect();
                insert_register_table($dbh, $id, $name, $price, $title, $comment, $area,
                $category_id, $tmp['new_img_filename'], '', '', '', $status, $date,$schedule);
                $msg[] = "編集しましたよ。";
             }
            
            
            if (isset($err_msg) === TRUE){
                foreach ($err_msg as $value) {
                    print $value."<br>";
                }
            }
     
        
        } catch (Exception $e) {
          $err_msg[] = $e->getMessage();
        }
    }
    include_once './../view/register_view.php';
    
    

