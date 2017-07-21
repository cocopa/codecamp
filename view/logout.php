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


<?php
    // 設定ファイル読み込み
    require_once './../conf/const.php';
session_start();

if (isset($_SESSION["NAME"])) {
    $errorMessage = "ログアウトしました。";
} else {
    $errorMessage = "もう一度ログインし直してください。";
}

// セッションの変数のクリア
$_SESSION = array();

// セッションクリア
@session_destroy();
?>



    <body>
        <h1>ログアウトしましたので、再度ログインしてください。</h1>
        <div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
        <hr>
        <br>
        <p><a class="btn btn-primary btn-lg" href="./../controller/login.php" role="button">ログイン画面に戻る</a></p>
        
    </body>
</html>