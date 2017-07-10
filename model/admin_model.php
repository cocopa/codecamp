<?php

//################################################################//
//ユーザー登録のCRUD処理
//################################################################//



/*--------------------------------------------------*
* ユーザーを追加する
*
--------------------------------------------------**/
function insert_users_table($dbh, $user, $password,$user_area,$user_category,$status,$update_date,$img) {
    
    $dbh->beginTransaction();
    try{
      // SQL生成
      //$sql = 'INSERT INTO `users`(`user`, `password`, `user_area`, `user_category`,  `user_status`, `create_datetime`,`update_datetime`) VALUES (?,?,?,?,?,?,?)';
      
      $sql = 'INSERT INTO `users`(`user`, `password`, `user_area`, `user_category`,  `user_status`, `created_at`,`updated_at`,`img`) VALUES (?,?,?,?,?,?,?,?)';
      // クエリ実行
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
      //コミット
      $dbh->commit();
        
    }catch (PDOException $e) {
        // ロールバック処理
        $dbh->rollback();
        throw $e;
        
    }

}
