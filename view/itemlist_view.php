<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>アドバイザー一覧</title>
  <p>
    <?php
      //print $_SESSION["ID"].":".$_SESSION["NAME"]."さん。こんにちは";
    ?>
  </p>
  <!--<link rel="stylesheet" href="./../css/itemlist.css">-->
  
</head>
<body>
  <h1>商品一覧</h1>

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
        <p class="タイトル"><?php echo $value['title'] ?></p>
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

<p><a class="btn btn-primary btn-lg" href="./../controller/register.php" role="button">あなたもアドバイザーとして登録しませんか?</a></p>
<br>
<p><a class="btn btn-primary btn-lg" href="./../view/logout.php" role="button">ログインアウトする</a></p>
    
</body>

</html>