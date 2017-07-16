<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>カート</title>
  <p>
    <?php
      print $_SESSION["ID"].":".$_SESSION["NAME"]."さん。こんにちは";
    ?>
  </p>
<link rel="stylesheet" href="shop.css">
</head>
<body>
<h1>カート</h1>
<table>
  <tr><th>商品名</th><th>単価</th><th>小計</th></tr>
  <?php foreach($item_list as $r) { ?>
    <tr>
      <td><?php echo $r['title'] ?></td>
      <td><?php echo $r['price'] ?></td>
      <td><?php echo $r['price'] ?> 円</td>
    </tr>
  <?php } ?>
  <tr><td colspan='2'> </td><td><strong>合計</strong></td><td><?php echo $sum ?> 円</td></tr>
</table>
<div class="base">
  <a href="./../controller/itemlist.php">お買い物に戻る</a>　
  <a href="./../controller/itemlist.php">カートを空にする</a>　
  <a href="./../controller/buy.php">購入する</a>
</div>
</body>
</html>