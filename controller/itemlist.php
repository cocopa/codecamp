<?php
    // 設定ファイル読み込み
    require_once './../conf/const.php';
    // 関数ファイル読み込み
    require_once './../model/common.php';
    $request_method=get_request_method();
    $data = [];
    $err_msg = [];
   
    session_start();
    


    
    if ($request_method === 'POST') {
        try {
          // DB接続
            $dbh = get_db_connect();
            
            
            $name = get_post_data('name');
            $password  = get_post_data('password');
            
            
            if (empty($name)) {  // emptyは値が空のとき
                $err_msg[]  = 'ユーザーIDが未入力です。';
            } else if (empty($password)) {
                $err_msg[]  = 'パスワードが未入力です。';
            }
            
            $stmt = $dbh->prepare('SELECT * FROM users WHERE user = ?');
            $stmt->execute(array($name));
            

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($row['password'] === $password) {
                    
                    session_regenerate_id(true);
                    
                    // 入力したIDのユーザー名を取得
                    $id = $row['id'];
                    $sql = "SELECT * FROM users WHERE id = $id";  //入力したIDからユーザー名を取得
                    $stmt = $dbh->query($sql);
                    foreach ($stmt as $row) {
                        $row['name'];  // ユーザー名
                        
                    }
                    
                    $_SESSION["NAME"] = $row['user'];
                    $_SESSION["ID"] = $row['id'];
                    //header("Location: main.php");  // メイン画面へ遷移
                    //exit();  // 処理終了
                } else {
                    // 認証失敗
                    $err_msg[]  = 'ユーザーIDあるいはパスワードに誤りがあります。';
                }
            } else {
                // 4. 認証成功なら、セッションIDを新規に発行する
                // 該当データなし
                $err_msg[]  = 'ユーザーIDあるいはパスワードに誤りがあります。';
            }




            if (isset($err_msg) === TRUE){
              foreach ($err_msg as $value) {
                print "<h2>".$value."</h2>";
                require './../view/logout.php';
                exit;
               }
            }
            
            
            //echo $name."さんこんにちは","<br>";
            
            
            
            /*
            if(isset($_COOKIE["visitLog"])){
                $logdata = $_COOKIE["visitLog"];
                $counter = $logdata["counter"];
                $time = $logdata["time"];
                $nowtime = date("Y年n月j日 g時i分s秒");
                $lasttime = $time;
                echo "クッキーあり"."<br>";
            }else{
                $counter = 0;
                $lasttime = "今回が初めての訪問";
            }
            */
            
            
            //セッション
            /*
            session_start();
            if (!isset($_SESSION['count'])) {
              $_SESSION['count'] = 0;
            
            } else {
              $_SESSION['count']++;
            }
              $_SESSION['user'] = $user_name;
              $_SESSION['time']     = time();  
            
            */
            
            //クッキー保存
            /*
            $result1 = setcookie ('visitLog[counter]',++$counter);
            $result2 = setcookie ('visitLog[time]',$nowtime);
            $user_name = htmlspecialchars($user_name  , ENT_QUOTES, 'UTF-8');
            $cookie_check = htmlspecialchars($cookie_check, ENT_QUOTES, 'UTF-8');
            $result = ($result1 && $result2);
            */
            
            
            //echo 'セッションは開始されました<br>ID = ' . session_id();
            
            
            //バリデーション
           
            if (count($err_msg) === 0 ){
                $dbh = get_db_connect();
                $sql='SELECT * FROM `adviser`';
                // 商品の一覧を取得
                $data = call_sql($dbh,$sql);
                // 特殊文字をHTMLエンティティに変換
                $data = entity_assoc_array($data);
            }else{
              
              
            }
            
        
        } catch (Exception $e) {
          $err_msg[] = $e->getMessage();
        }
        /*
        if ($result ){
          echo "今回の訪問は", $counter, "回目の訪問です。","<br>";
          echo"今回の訪問は", $nowtime, "<br>";
          echo"前回の訪問は", $lasttime, "<br>";
          echo $_SESSION['user'] .date('Y m d H:i:s', $_SESSION['time']), "<br>";
        }
        */
    }
    
    
    
    try {
      // DB接続
      $dbh = get_db_connect();
      $sql = 'SELECT * FROM `adviser`';
      // 商品の一覧を取得
      $data = call_sql($dbh,$sql);
      // 特殊文字をHTMLエンティティに変換
      $data = entity_assoc_array($data);
    } catch (Exception $e) {
      $err_msg[] = $e->getMessage();
    }
    
    
    require './../view/itemlist_view.php';
    

