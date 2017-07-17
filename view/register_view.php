<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>管理画面</title>
        <link rel="stylesheet" href="./../css/admin.css">
        <!--<script type="text/javascript" src="js/adviser/login.js" charset="UTF-8"></script>-->
    </head>
    <body>
  <p>
    <?php
      print $_SESSION["ID"].":".$_SESSION["NAME"]."さん。こんにちは";
    ?>
  </p>
            <form class="form" method="post" action="./../controller/register.php" enctype="multipart/form-data">
                 <p><img src="./../icon/user.png"  width="200px"></p>
                <p><div><input type="file" name='new_img'></div></p>
                <hr>

                <p class="name">
                    <span>タイトル　　　　：</span>
                    <input type="text" name="title" placeholder="タイトル" id="title" />
                </p>
                <p class="name">
                    <span>アドバイザー内容：</span>
                    <input type="text" name="comment" placeholder="アドバイザー内容" id="comment" />
                </p>
                <p class="name">
                    <span>カテゴリー</span>
                    <select id="soflow" name="category_id">
                      <option>カテゴリーを選んでください</option>
                      <option value="1">マーケティング</option>
                      <option value="2">英語・通訳</option>
                      <option value="3">営業</option>
                      <option value="4">プログラマー</option>
                    </select>
                </p>
                <p class="name">
                    <span>値段</span>
                    <input type="text" name="price" placeholder="値段" id="price" />
                </p>
                <p class="name">
                    <span>場所</span>
                    <input type="text" name="area" placeholder="場所" id="area" />
                </p>
                <p class="name">
                    <span>スケジュール</span>
                    <input type="text" name="schedule" placeholder="スケジュール" id="schedule" />
                </p>
                <p>
                    <input type="hidden" name="user" value="<?php print $_SESSION["NAME"]; ?>">
                    <button type="submit" class="button-blue" name="status" value=1>公開する</button>
                    <button type="submit" class="button-blue" name="status" value=2>非公開にする</button>
                    
                </p>
                <p>
                    <a href="./../controller/itemlist.php">お買い物に戻る</a>　
                </p>
            </form>
    </body>
</html>