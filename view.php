<?php
session_name('chicago_session');
session_start();

if (empty($_GET['id'])) {
    exit;
}

if (empty($_SESSION['logged'])) {
    header('Location: auth.php');
    exit;
}

$contents = @file_get_contents('./log/'.md5($_GET['id']));
if (empty($contents)) {
    die('Not found');
}

?>
<html>
    <head>
        <title>View Log</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <style>
            .timestamp {
                color: green;
            }
        </style>
    </head>
    <body>
        <div>
            <div><b>Log ID:</b> <code><?php echo htmlspecialchars($_GET['id']); ?></code></div>
            <div><b>Hash:</b> <code><?php echo md5($_GET['id']); ?></code></div>
        </div>
        <hr>
        <div style="font-family: monospace">
            <?php echo $contents; ?>
        </div>
    </body>
</html>
