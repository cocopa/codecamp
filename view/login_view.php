<!DOCTYPE html>
<html lang="ja">
<head>
<style type="text/css">
.jumbotron { background:url("./../icon/office.png") center no-repeat; background-size: cover;}
</style>
</head>


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Rental Adviser</title>


<body>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Rental Adviser</a> </div>
  </div>
  <!-- /.container-fluid --> 
</nav>
<section>
  <div class="jumbotron text-center">
    <div class="container">
      <div class="row">
        <div class="col-xs12">
          <font color="#ffffff">
          <h1>レンタル　アドバイザー</h1>
          <p>教育をする方と教育を受けたい方をマッチング支援するサービス</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
          </font>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 text-center">
        <h1>目的</h1>
        <p>ノウハウを教えたいアドバイザーとノウハウを学びたい人（オーディエンス）を支援する目的。</p>
        <p>アドバイザーのノウハウを現役世代に受け継ぎ、新しい仕事や次の可能性に結びつける。</p>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container well">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="media">
          <div class="media-left"> <a href="#"> <img class="media-object" src="./../icon/user.png" alt="..." width=40> </a> </div>
          <div class="media-body">
            <h3 class="media-heading">アドバイザーとは</h3>
            <p>定年で時間に余裕がある人</p>
            <p>仕事の広報活動</p>
            </div>
            
        </div>
      
        <div class="media">
          <div class="media-left"> <a href="#"> <img class="media-object" src="./../icon/user.png" alt="..." width=40> </a> </div>
          <div class="media-body">
            <h3 class="media-heading">オーディエンスとは</h3>
            <p>定年で時間に余裕がある人</p>
            <p>新しい仕事趣味</p>
            <p>スタートアップに挑戦したい方</p>
            </div>
        </div>
      
      </div>
      </div>
    </div>
  
</section>

<hr>
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1>新しいことにチャレンジしませんか？</h1>
        <p>新しいことにチャレンジしたい人あるいはスキルアップ向けの教育支援サービス。</p>
        <p>特徴は、気軽に元職人に話を聞いたり技術を学んだりすることができ、仕事から趣味に関する技術のアドバイザーを必要としている方をサポート</p>
              <form method="post" action="./../controller/itemlist.php">
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
                  <button type="submit" class="btn btn-primary btn-lg" name="form_type" value="./../controller/itemlist.php">ログイン</button>
                  </p>
                </form>
                <form action="./../controller/admin.php" method="post" class="media-body">
                  <p>
                    <button type="submit" class="btn btn-primary btn-lg" name="form_type" value="./../controller/admin.php">新規登録</button>
                  </p>
                </form>
      </div>
    </div>
  </div>
</section>
<hr>

  <footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>Copyright © Shinya Ishida. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>

</body>
</html>