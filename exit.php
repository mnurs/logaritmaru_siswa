<?php
session_name('chicago_session');
session_start();

unset($_SESSION['logged']);
header('Location: auth.php');

