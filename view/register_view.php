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
        
            <form class="form" method="post" action=# enctype="multipart/form-data">
                <div>
                     <img src="<?php print img_dir.$value['img']; ?>"  width="200px">
                     <img src="<?php print img_dir.$value['img']; ?>"  width="200px">
                     <img src="<?php print img_dir.$value['img']; ?>"  width="200px">
                     <img src="<?php print img_dir.$value['img']; ?>"  width="200px">
                </div>
                <hr>
                <p class="name">
                    <span>タイトル　　</span>
                    <input type="text" name="name" placeholder="タイトル" id="name" />
                </p>
                <p class="name">
                    <span>アドバイザー内容</span>
                    <input type="text" name="name" placeholder="アドバイザー内容" id="name" />
                </p>
                <p class="name">
                    <span>カテゴリー</span>
                    <select id="soflow">
                      <option>カテゴリーを選んでください</option>
                      <option>Option 1</option>
                      <option>Option 2</option>
                    </select>
                </p>
                <p class="name">
                    <span>値段</span>
                    <input type="text" name="name" placeholder="値段" id="name" />
                </p>
                <p class="name">
                    <span>場所</span>
                    <input type="text" name="name" placeholder="場所" id="name" />
                </p>
                <p class="name">
                    <span>スケジュール</span>
                    <input type="text" name="name" placeholder="スケジュール" id="name" />
                </p>

                <p>
                    <button type="submit" class="button-blue" name="form_type" value="./../controller/admin.php">公開する</button>
                    <button type="submit" class="button-blue" name="form_type" value="./../controller/admin.php">非公開にする</button>
                </p>
            </form>
    </body>
</html>