<?php
session_name('chicago_session');
session_start();

if (empty($_SESSION['logged'])) {
    header('Location: auth.php');
    exit;
}

?>
<html>
    <head>
        <title>Chicago</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
    </head>
    <body>
        <div>
            <form method="get" action="view.php">
                <div><input type="text" name="id" placeholder="Log ID"></div>
                <div><button type="submit">View</button></div>
            </form>
        </div>
        <div><a href="exit.php">Exit</a></div>
    </body>
</html>
