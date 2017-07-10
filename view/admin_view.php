<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>ログイン</title>
        
        <link rel="stylesheet" href="./../css/admin.css">
        <!--<script type="text/javascript" src="js/adviser/login.js" charset="UTF-8"></script>-->
    </head>
    <body>
            <form class="form" method="post" enctype="multipart/form-data">
                <div>


                    <svg height="130" width="500">
                      <defs>
                        <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                          <stop offset="0%" style="stop-color:rgb(255,255,0);stop-opacity:1" />
                          <stop offset="100%" style="stop-color:rgb(255,0,0);stop-opacity:1" />
                        </linearGradient>
                      </defs>
                      <ellipse cx="100" cy="70" rx="85" ry="55" fill="url(#grad1)" />
                      <text fill="#ffffff" font-size="45" font-family="Verdana" x="50" y="86">ユーザー</text>
                      Sorry, your browser does not support inline SVG.
                    </svg>

                </div>
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
                <!--
                <p class="text">
                    <span>パスワード確認</span>
                    <input type="password" name="password" class="validate[required,length[6,300]] feedback-input" id="password" placeholder="パスワード確認">
                </p>
                -->
                <p class="text">
                    <span>マッチング地域</span>
                    <input type="text" name="user_area" placeholder="地域"/>
                </p>
                <p>
                    <input type="checkbox" name="category1">料理
                </p>
                <p>
                    <input type="checkbox" name="category2">プログラミング
                </p>
                <p>
                    <input type="checkbox" name="category3">その他
                </p>
                <p>
                    <button type="submit" class="button-blue" name="form_type" value="./../controller/admin.php">登録</button>
                </p>
            </form>
        
        
        
        
    </body>
</html>