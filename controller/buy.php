<?php
    // 設定ファイル読み込み
    require_once './../conf/const.php';
    // 関数ファイル読み込み
    require_once './../model/common.php';
    $request_method=get_request_method();
    $msg = [];
    $err_msg = [];
    if ($request_method === 'GET') {
        try {
           $user_id = $_SESSION["ID"];
          
           /*
           $sql = 'UPDATE `adviser` SET `status`=?,upload_at=? WHERE `id`=?';
            // クエリ実行
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(1, "2",    PDO::PARAM_STR);
            $stmt->bindValue(2, date("Y-m-d H:i:s"),    PDO::PARAM_STR);
            $stmt->bindValue(3, $item_id,    PDO::PARAM_STR);
            //SQLを実行
            $stmt ->execute(); 
            
        
        print $user_id;
        $dbh = get_db_connect();
          $sql = 'DELETE FROM `carts` WHERE `user_id`=?';
          $stmt = $dbh->prepare($sql);
          $stmt->bindValue(1,$user_id,PDO::PARAM_STR);
          $stmt ->execute();  
          

          print "カートの中身を消去しました。";
            */
        
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
    
    
    include_once './../view/buy.php';