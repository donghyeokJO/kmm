<?php
include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

if (isset($_COOKIE['u_code_cookie']) && isset($_COOKIE['u_pw_cookie'])) {
    $u_code = $_COOKIE['u_code_cookie'];
    $hash = $_COOKIE['u_pw_cookie'];

    $u_code = rtrim($u_code, '?');
    $query = "select * from user where u_code = '$u_code'";
    $ret = mysqli_query($conn, $query);
    $user = mysqli_fetch_array($ret);
    $u_pw = $user['u_pw'];
    $hash2 = Decrypt($hash, $secret_key, $secret_iv);
    // echo $hash2;
    // echo $u_email;
    session_start();
    if (password_verify($hash2, $u_pw)) {
        $_SESSION['u_code'] = $u_code;
    }
}
