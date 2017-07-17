<?php
     // 設定ファイル読み込み
    require_once './../conf/const.php';
    // 関数ファイル読み込み
    require_once './../model/common.php';
    $request_method=get_request_method();
    // セッションの開始
    session_start();
    $data = [];
    $err_msg = []; 
   $item_list =[];
    // 現在日時を取得
    $now_date = date('Y-m-d H:i:s');
    if ($request_method === 'POST') {
        try {
          // DB接続
            $dbh = get_db_connect();
            $title = get_post_data('title');
            $price  = get_post_data('price');
            $user_id = $_SESSION["ID"];
          //print $_POST['id'];
          //print $_SESSION["NAME"];
          
          if (isset($_POST['id']) === TRUE) {
            
            $item_id = $_POST['id'];
            $sql = 'SELECT
                      *
                  FROM carts JOIN adviser
                  ON carts.item_id = adviser.id
                  WHERE carts.user_id = ?
                  AND adviser.id = ?';
            $stmt = $dbh->prepare($sql);
            // SQL文のプレースホルダに値をバインド
            $stmt->bindValue(1, $user_id,    PDO::PARAM_INT);
            $stmt->bindValue(2, $item_id,    PDO::PARAM_INT);
            
            // SQLを実行
            $stmt->execute();
            // カート内のレコードの取得
            $list = $stmt->fetchAll();

            $same_item="";
            foreach($list as $r) {
              if ($r['item_id'] == ""){
                $same_item = $r['item_id']."があります。<br>";
                print $same_item;
              }
            }
      
      
            
            
            print "タイトル:".$title."をカートに入れました。"."<br>";
            
 
 
 
            $sql =  'INSERT INTO carts (`user_id`, `item_id`, `created_at`, `update_at`) 
                    VALUES (?, ?, ?, ?)';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(1, $user_id,    PDO::PARAM_INT);
            $stmt->bindValue(2, $item_id,    PDO::PARAM_INT);
            $stmt->bindValue(3, $now_date,     PDO::PARAM_INT);
            $stmt->bindValue(4, $now_date,   PDO::PARAM_STR);
            $stmt->execute(); 
            
            
            
            
            $sql = 'SELECT
                      *
                  FROM carts JOIN adviser
                  ON carts.item_id = adviser.id
                  WHERE carts.user_id = ?
                  AND adviser.id = ?';
                  
                  
            $stmt = $dbh->prepare($sql);
            // SQL文のプレースホルダに値をバインド
            $stmt->bindValue(1, $user_id,    PDO::PARAM_INT);
            $stmt->bindValue(2, $item_id,    PDO::PARAM_INT);
            
            // SQLを実行
            $stmt->execute();
            // カート内のレコードの取得
            $cart_list = $stmt->fetchAll();
            
                
                
                
                
                
            $sql = 'UPDATE `adviser` SET `status`=?,upload_at=? WHERE `id`=?';
            // クエリ実行
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(1, "2",    PDO::PARAM_STR);
            $stmt->bindValue(2, date("Y-m-d H:i:s"),    PDO::PARAM_STR);
            $stmt->bindValue(3, $item_id,    PDO::PARAM_STR);
            //SQLを実行
            $stmt ->execute();
    
            
        }
        
          
        } catch (Exception $e) {
          $err_msg[] = $e->getMessage();
        }

    }else{
        $user_id = $_SESSION["ID"];
        print $user_id;
        $dbh = get_db_connect();
          $sql = 'DELETE FROM `carts` WHERE `user_id`=?';
          $stmt = $dbh->prepare($sql);
          $stmt->bindValue(1,$user_id,PDO::PARAM_STR);
          $stmt ->execute();  
          

          print "カートの中身を消去しました。";
    }
  
  include_once './../view/cart_view.php';
  
