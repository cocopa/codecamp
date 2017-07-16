<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>ログイン</title>
        <link rel="stylesheet" href="./../css/login2.css">
    </head>
    <body>
      <h1>ログイン</h1>
            <div class="formType">
              <form class="form" method="post" action="./../controller/itemlist.php">
                <p class="name">
                  <input type="text" name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="ユーザーID" id="name" />
                </p>
                
                <p class="text">
                  <input type="password" name="password" class="validate[required,length[6,300]] feedback-input" id="password" placeholder="パスワード">
                </p>
                <p>
                  <input type="checkbox" name="cookie_check" value=1>次回からユーザ名の入力を省略
                </p>
                  <p>
                  <button type="submit" class="button-blue" name="form_type" value="./../controller/itemlist.php">送信</button>
                  </p>
                </form>
                <form action="./../controller/admin.php" method="post">
                  <p>
                    <button type="submit" class="button-blue" name="form_type" value="./../controller/admin.php">新規登録</button>
                  </p>
                </form>
            </div>
   
        
    </body>
</html>