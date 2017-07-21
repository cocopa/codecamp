<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>新規登録</title>
        
        <link rel="stylesheet" href="./../css/admin.css">
        <!--<script type="text/javascript" src="js/adviser/login.js" charset="UTF-8"></script>-->
    </head>
    <body>
            <form class="form" method="post" action="#" enctype="multipart/form-data">

                <p><img src="./../icon/user.png"  width="200px"></p>
                <p><div><input type="file" name='new_img'></div></p>
                <hr>
                <p class="name">
                    <span>ユーザーID　　</span>
                    <input type="text" name="user" placeholder="ユーザーID"/>
                </p>
                <p class="text">
                    <span>パスワード　　</span>
                    <input type="password" name="password" class="validate[required,length[6,300]] feedback-input" placeholder="パスワード">
                </p>
                <p class="text">
                    <span>マッチング地域</span>
                    <input type="text" name="user_area" placeholder="地域"/>
                </p>


                <select id="soflow" name="category_id">
                  <option>カテゴリーを選んでください</option>
                  <option value="1">マーケティング</option>
                  <option value="2">英語・通訳</option>
                  <option value="3">営業</option>
                  <option value="4">プログラマー</option>
                </select>
                <p>
                    <button type="submit" class="btn btn-primary btn-lg" name="form_type" value="./../controller/admin.php">登録</button>
                </p>

                <p><a class="btn btn-primary btn-lg" href="./../controller/login.php" role="button">戻る</a></p>
  
            </form>
    </body>
</html>