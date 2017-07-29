
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>






<?php
//<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">
//<script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
header('Content-Type: text/html; charset=UTF-8');
// データベースの接続情報
define('DB_USER',   'cocopa');    // MySQLのユーザ名
define('DB_PASSWD', '');    // MySQLのパスワード
define('DSN', 'mysql:dbname=rentaladviser;host=localhost;charset=utf8');  // データベースのDSN情報
define('TAX', 1.08);  // 消費税
define('img_dir','./../img/');

define('HTML_CHARACTER_SET', 'UTF-8');  // HTML文字エンコーディング


$pref = array(’1′=>’北海道’,’2′=>’青森県’,’3′=>’岩手県’,’4′=>’宮城県’,’5′=>’秋田県’,’6′=>’山形県’,’7′=>’福島県’,’8′=>’茨城県’,’9′=>’栃木県’,’10′=>’群馬県’,’11′=>’埼玉県’,’12′=>’千葉県’,’13′=>’東京都’,’14′=>’神奈川県’,’15′=>’新潟県’,’16′=>’富山県’,’17′=>’石川県’,’18′=>’福井県’,’19′=>’山梨県’,’20′=>’長野県’,’21′=>’岐阜県’,’22′=>’静岡県’,’23′=>’愛知県’,’24′=>’三重県’,’25′=>’滋賀県’,’26′=>’京都府’,’27′=>’大阪府’,’28′=>’兵庫県’,’29′=>’奈良県’,’30′=>’和歌山県’,’31′=>’鳥取県’,’32′=>’島根県’,’33′=>’岡山県’,’34′=>’広島県’,’35′=>’山口県’,’36′=>’徳島県’,’37′=>’香川県’,’38′=>’愛媛県’,’39′=>’高知県’,’40′=>’福岡県’,’41′=>’佐賀県’,’42′=>’長崎県’,’43′=>’熊本県’,’44′=>’大分県’,’45′=>’宮崎県’,’46′=>’鹿児島県’,’47′=>’沖縄県’);