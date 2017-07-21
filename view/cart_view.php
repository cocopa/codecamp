<head>
<meta charset="utf-8">
<title>カートの中身</title>
  <p>
    <?php
      print $_SESSION["ID"].":".$_SESSION["NAME"]."さん。こんにちは";
    ?>
  </p>
<link rel="stylesheet" href="shop.css">
</head>
<body>
<hr>
<h1>カートの中身</h1>
<table>
  
  <?php $sum=0; ?>
  <?php if (isset($cart_list) === TRUE) { ?>
    <tr><th>商品名</th><th>単価</th></tr>
    <?php foreach($cart_list as $r) { ?>
      <tr>
        <td><?php echo $r['title']; ?></td>
        <td><?php echo $r['price']; ?> 円</td>
      </tr>
      <?php $sum=$sum+$r['price']; ?>
    <?php } ?>
  <?php } ?>  
  <tr><td> </td><td><strong>合計</strong></td><td><?php echo $sum ?> 円</td></tr>
</table>
<div class="base">
  <form method="post" enctype="multipart/form-data">
      <a class="btn btn-primary btn-lg" href="./../controller/itemlist.php" role="button">お買い物に戻る</a>
      <a class="btn btn-primary btn-lg" href="./../controller/cart.php" role="button">カートを空にする</a>
      <a class="btn btn-primary btn-lg" href="./../controller/buy.php" role="button">購入する</a>
  </form>
</div>
</body>
</html>