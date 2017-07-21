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


<body class="panel-body">
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Rental Adviser</a> </div>
  </div>
  <!-- /.container-fluid --> 
</nav>
<head>
  <meta charset="UTF-8">
  <title>アドバイザー一覧</title>
  <p>
    <?php
      //print $_SESSION["ID"].":".$_SESSION["NAME"]."さん。こんにちは";
    ?>
  </p>
 
</head>
<body>
  <div class="panel panel-info"><h1>アドバイザー一覧</h1></div>

<table>
  <?php foreach ($data as $value) { ?>
    <tr>
      <td>
        <?php
        //var_dump($value);
        echo img_tag($value['img1']);
        ?>
      </td>
      <td>
        <p class="lead"><?php echo $value['title'] ?></p>
        <p><?php echo nl2br($value['comment']) ?></p>
      </td>
      <td width="80px">
        <p><?php echo $value['price'] ?> 円</p>
        <form method="post" enctype="multipart/form-data" action="./../controller/cart.php">
          <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
          <input type="hidden" name="price" value="<?php echo $value['price'] ?>">
          <input type="hidden" name="title" value="<?php echo $value['title'] ?>">
          <button type="submit"  name="submit" class="btn btn-default">カートへ</button>
        </form>
      </td>
    </tr>
  <?php } ?>
</table> 


<hr>

<h2>【アドバイザー募集！】 </h2>

<h3>アドバイザーとは</h3>


<ul class="list-group">
  <li class="list-group-item">教えるのが好きな人</li>
  <li class="list-group-item">仕事の広報活動したい</li>
  <li class="list-group-item">定年で時間に余裕がある人</li>
</ul>

<p><a class="btn btn-primary btn-lg" href="./../controller/register.php" role="button">あなたもアドバイザーとして登録しませんか?</a></p>
<br>
<p><a class="btn btn-primary btn-lg" href="./../view/logout.php" role="button">ログインアウトする</a></p>
    
</body>

</html>