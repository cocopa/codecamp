
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>




<?php
//<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">
//<script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
header('Content-Type: text/html; charset=UTF-8');
// データベースの接続情報
define('DB_USER',   'cocopa');    // MySQLのユーザ名
define('DB_PASSWD', '');    // MySQLのパスワード
define('DSN', 'mysql:dbname=camp;host=localhost;charset=utf8');  // データベースのDSN情報

define('TAX', 1.08);  // 消費税
define('img_dir','./../img/');

define('HTML_CHARACTER_SET', 'UTF-8');  // HTML文字エンコーディング


