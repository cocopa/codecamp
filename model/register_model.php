<?php

//################################################################//
//ユーザー登録のCRUD処理
//################################################################//



/*--------------------------------------------------*
* ユーザーを追加する
*
--------------------------------------------------**/
function insert_register_table($dbh, $id, $name, $price, $title, $comment, $area, $category_id, $img1, $img2, $img3, $img4, $status, $date,$schedule) {
    
    $dbh->beginTransaction();
    try{
      // SQL生成
      
      $sql = 'INSERT INTO `adviser`(`id`, `name`, `price`, `title`, `comment`, `area`, `category_id`, `img1`, `img2`, `img3`, `img4`, `status`, `created_at`, `upload_at`,`schedule`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
      
      // クエリ実行
      
      $stmt = $dbh->prepare($sql);
      $stmt->bindValue(1,  $id,       PDO::PARAM_STR);
      $stmt->bindValue(2,  $name,     PDO::PARAM_STR);
      $stmt->bindValue(3,  $price,    PDO::PARAM_STR);
      $stmt->bindValue(4,  $title,    PDO::PARAM_STR);
      $stmt->bindValue(5,  $comment,  PDO::PARAM_STR);
      $stmt->bindValue(6,  $area,     PDO::PARAM_STR);
      $stmt->bindValue(7,  $category_id,    PDO::PARAM_STR);
      $stmt->bindValue(8,  $img1,    PDO::PARAM_STR);
      $stmt->bindValue(9,  $img2,    PDO::PARAM_STR);
      $stmt->bindValue(10, $img3,    PDO::PARAM_STR);
      $stmt->bindValue(11, $img4,    PDO::PARAM_STR);
      $stmt->bindValue(12, $status,  PDO::PARAM_STR);
      $stmt->bindValue(13, $date,    PDO::PARAM_STR);
      $stmt->bindValue(14, $date,    PDO::PARAM_STR);
      $stmt->bindValue(15, $schedule,       PDO::PARAM_STR);
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

/*--------------------------------------------------*
* 画像アップロード前処理
*
--------------------------------------------------**/
function upload_for_img2($err_msg,$img_tmp){
    
    //戻り値用の変数を準備
    $err_msg[] ='';
    $file_contents = '';
    $new_img_filename = '';
    
    if (is_uploaded_file($_FILES[$img_tmp]['tmp_name']) === TRUE) {
      // 画像の拡張子を取得
      $extension = pathinfo($_FILES[$img_tmp]['name'], PATHINFO_EXTENSION);
      // 指定の拡張子であるかどうかチェック
      $extension = strtolower($extension);
      if ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png') {
        // 保存する新しいファイル名の生成（ユニークな値を設定する）
        $new_img_filename = sha1(uniqid(mt_rand(), true)). '.' . $extension;
        // 同名ファイルが存在するかどうかチェック
        if (is_file(img_dir . $new_img_filename) !== TRUE) {
          // アップロードされたファイルを指定ディレクトリに移動して保存
          if (move_uploaded_file($_FILES[$img_tmp]['tmp_name'], img_dir . $new_img_filename) !== TRUE) {
              $err_msg[] = 'ファイルアップロードに失敗しました';
          }
        } else {
          $err_msg[] = 'ファイルアップロードに失敗しました。再度お試しください。';
        }
      } else {
        $err_msg[] = 'ファイル形式が異なります。画像ファイルはJPEG,pngのみ利用可能です。';
      }
      
      
    } else {
      //$err_msg[] = 'ファイルを選択してください';
      return;
    }

    $return_file = ['img' => $file_contents , 'new_img_filename' => $new_img_filename , 'err_message' => $err_msg];
    return $return_file;
}