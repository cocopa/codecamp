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
        <p><a class="btn btn-primary btn-lg" href="./../controller/cart.php" role="button">ログイン画面に戻る</a></p>
        
    </body>
</html>