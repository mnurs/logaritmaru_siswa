<?php
require_once('./config.php');

$success = FALSE;

if (!empty($_GET['id']) && !empty($_GET['data']) && !empty($_GET['time']) && !empty($_GET['signature'])) {
    if (sha1($_GET['id'].$_GET['data'].$_GET['time'].SECRET_KEY) === $_GET['signature']) {
        if (time() <= $_GET['time'] + 5) {
            $timestamp = date('d-m H:i:s');
            file_put_contents('./log/'.md5($_GET['id']), '<div><span class="timestamp">['.htmlspecialchars($timestamp).']</span> '.htmlspecialchars(substr($_GET['data'], 0, MAX_CHARS)).'</div>'.PHP_EOL, FILE_APPEND);
            $success = TRUE;
        }
    }
}

if ($success === FALSE) {
    die('Sorry do not think you belong here :)');
}

