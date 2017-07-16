<?php
///販売するドリンクの追加・変更を行う「管理ページ」
    
    // 設定ファイル読み込み
    require_once './conf/const.php';
    // 関数ファイル読み込み
    require_once './model/common.php';
    $drink_data = [];
    $err_msg    = [];
    $msg        = [];
    $request_method=get_request_method();
    if ($request_method === 'POST') {
         // POST値取得
        $id = get_post_data('id');
        $change_drink_id = get_post_data('drink_id2');
        $drink_name = get_post_data('drink_name');
        $price      = get_post_data('price');
        $stock      = get_post_data('amount');
        $img        = get_post_data('img');
        $status     = get_post_data('status');
        $change_stock = get_post_data('change_stock');
        $change_status = get_post_data('status');
        $update_date = date("Y-m-d H:i:s");
        $date = date("Y-m-d H:i:s");
    
        
            //商品追加
            if ($_POST['form_type'] === '商品追加'){
                //バリデーション
                $err_msg=validate_name($drink_name,'ドリンク名',$err_msg);
                $err_msg=validate_num($price,'値段',$err_msg);
                $err_msg=validate_num($stock,'個数',$err_msg);
                $err_msg=validate_status($status,$err_msg);
                $tmp=upload_for_img($err_msg);
                $err_msg = $tmp['err_message'];
                
                if (count($err_msg) === 0 ){
                    $dbh = get_db_connect();
                    insert_drink_table($dbh, $drink_name, $price,$tmp['new_img_filename'],$status,$update_date,$stock);
                    $msg[] = $drink_name."追加しましたよ。";
                }
            
            //在庫数変更
            }elseif ($_POST['form_type'] === 'change_stock'){
              
                
                $err_msg=validate_num($change_stock,'数量',$err_msg);
                
                
                if (count($err_msg) === 0 ){
                
                    //echo $drink_id."変更"."<br>";
                    $dbh = get_db_connect();
                    update_drink_stock($dbh, $change_drink_id, $change_stock);
                    $msg[] = $change_stock."個に変更しましたよ。";
              
                }
            //ステータス変更
            }elseif ($_POST['form_type'] === 'change_status'){
                
                
                $dbh = get_db_connect();
                if ($change_status === '0') {
                    $change_status = '1';
                    $change＿status＿comment = "公開に変更しました。";
                    
                }else{
                    $change_status = '0';
                    $change＿status＿comment = "非公開に変更しました。";
                }
                
                update_status($dbh, $change_drink_id, $change_status);
                $msg[] = $change＿status＿comment;
            }
            
    }
    
    
    

    try {
      // DB接続
      $dbh = get_db_connect();
      $sql='SELECT * FROM `drink_master` inner join drink_stock
                          on drink_master.drink_id = drink_stock.drink_id' ;
      // 商品の一覧を取得
      $drink_data = call_sql($dbh,$sql);
      // 特殊文字をHTMLエンティティに変換
      $drink_data = entity_assoc_array($drink_data);
    } catch (Exception $e) {
      $err_msg[] = $e->getMessage();
    }


// 商品一覧テンプレートファイル読み込み
include_once './view/tool.php';
