<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>商品一覧</title>
  <link rel="stylesheet" href="./../css/itemlist.css">
</head>
<body>
  <h1>商品一覧</h1>
    <form method="post" enctype="multipart/form-data" action="./../controller/cart.php">
        <?php foreach ($data as $value) { ?>
            <ul>
              <li>
                <p><img src="<?php print img_dir.$value['img']; ?>"  width="200px"></p>
                <p>ユーザ：<?php print $value['user']; ?></p>
                <p>場所：<?php print $value['user_area']; ?></p>
                <p><input type="radio" value=<?php print $value['id']; ?> name="id"/>選択</p>
              </li>
            </ul>
        <?php } ?>
        
          <input type="hidden" name="code" value="<?php echo $value['id'] ?>">
          <input type="submit" name="submit" value="カートへ">
    </form>
    
</body>
</html>