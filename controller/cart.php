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
          
          print $_POST['id'];
          $user_id=$_SESSION["ID"]；
          if (isset($_POST['id']) === TRUE) {
            $item_id = $_POST['id'];
            $item_id = $_POST['id'];
            $sql = 'SELECT
                       carts.user_id,
                       carts.item_id,
                       adviser.title
                  FROM carts JOIN adviser
                  ON carts.id = adviser.id
                  WHERE carts.id = ?
                  AND adviser.id = ?';
                  
                  
            $stmt = $dbh->prepare($sql);
            // SQL文のプレースホルダに値をバインド
            $stmt->bindValue(1, $item_id,    PDO::PARAM_INT);
            $stmt->bindValue(2, $user_id,    PDO::PARAM_INT);
        
            // SQLを実行
            $stmt->execute();
            // カート内のレコードの取得
            $cart_list = $stmt->fetchAll();
                
              
              
              

      
            $sql =  'INSERT INTO carts (user_id, item_id, amount, create_datetime) 
                    VALUES (?, ?, ?, ?)';
            
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(1, $user_id,    PDO::PARAM_INT);
            $stmt->bindValue(2, $item_id,    PDO::PARAM_INT);
            $stmt->bindValue(3, $now_date,     PDO::PARAM_INT);
            $stmt->bindValue(4, $now_date,   PDO::PARAM_STR);
            
            $stmt->execute();
    
            
        }
        
        // 公開商品のみ表示
        $sql = 'SELECT 
                    items.item_id,
                    items.name,
                    items.price,
                    items.img,
                    items.status,
                    items.stock
              FROM items
              WHERE status = 1';
                
        // SQL文を実行する準備
        $stmt = $dbh->prepare($sql);
        
        // SQLを実行
        $stmt->execute();
        
        // レコードの取得
        $item_list = $stmt->fetchAll();
                    
        //var_dump($item_list);
        
        if (isset($item_list) === FALSE) {
           
          }
        var_dump($item_list);
        } catch (Exception $e) {
          $err_msg[] = $e->getMessage();
        }

    }
  
  
  include_once './../view/cart_view.php';