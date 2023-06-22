<?php
require_once('./config.php');

session_name('chicago_session');
session_start();

if (!empty($_SESSION['logged'])) {
    header('Location: dashboard.php');
    exit;
}

if (!empty($_POST['submit'])) {
    $token = $_POST['token'];
    if (sha1($token) === VALID_TOKEN_HASH) {
        $_SESSION['logged'] = TRUE;
        header('Location: dashboard.php');
        exit;
    }
}

?>
<html>
    <head>
        <title>Chicago</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
    </head>
    <body>
        <h1>Codename Chicago</h1>
        <div>
            <form method="post">
                <div><input type="password" name="token" placeholder="Token"></div>
                <div><button type="submit" name="submit" value="1">Lesgoo!</button></div>
            </form>
        </div>
    </body>
</html>
