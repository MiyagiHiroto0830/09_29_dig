<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>オリジナルサイト</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
    <header>
        <div class="header_contents">
            <div class="header_sub">地元民による厳選グルメ</div>
            <div class="header_main">
                <h3>dig</h3>
                <h3 id="submit">投稿</h3>
                <a href="login/logout.php">ログアウト</a>
            </div>
        </div>
    </header>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $("#submit").on("click", function() {
            location.href = "form.php";

        });
    </script>
</body>

</html>