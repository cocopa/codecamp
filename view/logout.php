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

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ログアウト</title>
    </head>
    <body>
        <h1>ログアウトしましたので、再度ログインしてください。</h1>
        <div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
        <a href="./../controller/login.php">ログイン画面に戻る</a>
    </body>
</html>