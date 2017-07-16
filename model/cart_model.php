<?php
  require 'common.php';
  $rows = array();
  $sum = 0;
  $pdo = connect();
  if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
  if (@$_POST['submit']) {
    @$_SESSION['cart'][$_POST['code']] += $_POST['num'];
  }
  foreach($_SESSION['cart'] as $code => $num) {
    $st = $pdo->prepare("SELECT * FROM goods WHERE code=?");
    $st->execute(array($code));
    $row = $st->fetch();
    $st->closeCursor();
    $row['num'] = strip_tags($num);
    $sum += $num * $row['price'];
    $rows[] = $row;
  }
  require 't_cart.php';
  
  
  
  
  

/*--------------------------------------------------*
* ユーザーを追加する
*
--------------------------------------------------**/
function cart_table($dbh, $user, $password,$user_area,$user_category,$status,$update_date,$img) {
    
    $dbh->beginTransaction();
    try{
        // SQL生成
        $sql = 'SELECT
             carts.user_id,
             carts.item_id,
             users.name
        FROM carts JOIN adviser
        ON carts.id = users.id
        WHERE carts.id = ?
        AND users.id = ?';
        // クエリ実行
        $date = date('Y-m-d H:i:s');
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $user,    PDO::PARAM_STR);
        $stmt->bindValue(2, $password,    PDO::PARAM_STR);
        $stmt->bindValue(3, $user_area,    PDO::PARAM_STR);
        $stmt->bindValue(4, $user_category,    PDO::PARAM_STR);
        $stmt->bindValue(5, $status,    PDO::PARAM_STR);
        $stmt->bindValue(6, $update_date,    PDO::PARAM_STR);
        $stmt->bindValue(7, $update_date,    PDO::PARAM_STR);
        $stmt->bindValue(8, $img,    PDO::PARAM_STR);
         // SQLを実行
        $stmt->execute();
        // カート内のレコードの取得
        $cart_list = $stmt->fetchAll();
        $sql =  'INSERT INTO carts (user_id, item_id, created_at	, update_at) 
                VALUES (?, ?, ?, ?)';
        
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $user_id,    PDO::PARAM_INT);
        $stmt->bindValue(2, $item_id,    PDO::PARAM_INT);
        $stmt->bindValue(3, $now_date,   PDO::PARAM_STR);
        $stmt->bindValue(4, $now_date,   PDO::PARAM_STR);
        
        $stmt->execute();
   

          // 公開商品のみ表示
          $sql = 'SELECT 
                      *
                FROM adviser
                WHERE status = 1';
          // SQL文を実行する準備
          $stmt = $dbh->prepare($sql);
          // SQLを実行
          $stmt->execute();
          // レコードの取得
          $item_list = $stmt->fetchAll();

        
    }catch (PDOException $e) {
        // ロールバック処理
        $dbh->rollback();
        throw $e;
        
    }

}

  
  