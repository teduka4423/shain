<?php
// ユーザ情報取得クラス
class user_class
{
    private  $mail ="";       // メールアドレス
    private  $Admini = "";    // 管理者　0：一般、1：管理者
    private  $username = "";  //　ユーザ名

    // ユーザ情報取得
    function __construct($email,$password)
    {
        // #1 変数宣言
        
        
        $dirpath = "";
        $user_name = "";

        // #2 ログイン情報ファイル読み込み
        $f = fopen("./conf/login_data.csv", "r");

        // #3 csvのデータを配列に変換
        while($line = fgetcsv($f)) {
     
            //送信されたID及びPASSの確認
            if($_POST['email'] == $line[0] AND $_POST['password']   == $line[1] ){
                $this->mail = $line[0];
                $this->Admini = $line[2];
                $this->username = $line[3] ;
            }
        }
        // #4 ファイルを閉じる
        fclose($f);
    }
    public function get_mail() 
    {
        return($this->mail);
    }
    public function get_Admini() 
    {
        return($this->Admini);
    }
    public function get_username() 
    {
        return($this->username);
    }
}
?>