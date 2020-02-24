<?php

    include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);

    $u_code = $_GET['u_code'];

    $query = "delete from user where u_code = '$u_code'";

    if ($ret = mysqli_query($conn, $query)) {
        s_msg('처리 되었습니다');
        echo '<script>location.href="/admin/"</script>';
    } else {
        msg('처리실패!');
    }
