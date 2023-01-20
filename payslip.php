<?php 
// クラス宣言
require './class/user_class.php';

// ユーザ情報取得
$user = new user_class($_POST['email'],$_POST['password']);

// ユーザ情報取得確認
if($user->get_username() == ""){
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>マイページ</title>
</head>
<body>
<h2><?php echo $user->get_username(); ?>さん明細一覧</h2>

<?php
if( $user->get_Admini() == 1)
{
    // 管理者
    print("<div align=\"left\">");    
    print("<form method=\"post\" name=\"form1\" action=\"upload.php\">");
    print("<input type=\"hidden\" name=\"dirpath\" value=\"payslip/2022\">");
    print("</div>");
    print("<a href=\"javascript:form1.submit()\">アップロード</a>");
    print("</form>");
    print("</div>");
}
?>

<br>
<br>
<table border="1">
<th>ファイル名</th>
<th>ファイル表示</th>
<th>ファイルダウンロード</th>

<?PHP
// 年取得
$year = date('Y'); 

// ユーザ対象のファイルリスト取得
$filelist = glob("payslip/" . $year . "/" . $user->get_username(). "*");

// ファイル数をカウントする
$count = count($filelist);

// 中身をfor文で取得
for($i=0; $i<$count; $i++){
    $filename=basename($filelist[$i]);

    print("<tr>\n");
    print("<td>" .$filename."</td>\n");
    print("<td>");
    print("<button onclick=\"window.open('". $filelist[$i] . "')\"> ファイル表示</button>");
    print("</td>\n");
    print("<td>");
    print("<a href=\"". $filelist[$i] . "\" download>ダウンロード</a>");
    print("</td>\n");
    print("</tr>\n");

}
?>
</table>
</body>
</html>