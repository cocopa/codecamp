<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>商品一覧</title>
  <p>
    <?php
      print $_SESSION["ID"].":".$_SESSION["NAME"]."さん。こんにちは";
    ?>
  </p>
  <a href="./../controller/register.php">あなたもアドバイザーとして登録しませんか？</a>
  <link rel="stylesheet" href="./../css/itemlist.css">
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
          <?php echo $value['id'] ?>
          <input type="submit" name="submit" value="カートへ">
        </form>
      </td>
    </tr>
  <?php } ?>
</table> 
    
</body>
<foot><a href="logout.php">ログアウトする。</a></foot>
</html>