<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>購入済み</title>
    </head>
    <body>
        <h1>購入しました。</h1>
        <div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
        <hr>
        <br>
        <p><a class="btn btn-primary btn-lg" href="./../controller/itemlist.php" role="button">アイテム一覧に戻る</a></p>
        
    </body>
</html>