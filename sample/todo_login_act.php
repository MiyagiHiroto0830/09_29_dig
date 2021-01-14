<?php
session_start();
include("functions.php");
$pdo = connect_To_Db();
$username = $_POST["username"];
$password = $_POST["password"];
// dbにデータがあるかどうかを確認
$sql = 'SELECT * FROM users_table 
WHERE username=:username 
AND password=:password
AND is_deleted=0';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $val = $stmt->fetch(PDO::FETCH_ASSOC); // 該当レコードだけ取得
    if (!$val) { // 該当データがないときはログインページへのリンクを表示
        echo "<p>ログイン情報に誤りがあります.</p>";
        echo '<a href="todo_login.php">login</a>';
        exit();
    } else {
        $_SESSION = array(); // セッション変数を空にする 
        $_SESSION["session_id"] = session_id();
        $_SESSION["is_admin"] = $val["is_admin"];
        $_SESSION["username"] = $val["username"];
        header("Location:todo_read.php"); // 一覧ページへ移動 
        exit();
    }
}
