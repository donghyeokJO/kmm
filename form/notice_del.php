<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/config/header.php';
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $n_id = $_GET['id'];
    $query = "delete from reply where n_id = '$n_id'";
    if (mysqli_query($conn, $query)) {
        $query = "delete from notice where n_id='$n_id'";
        if (mysqli_query($conn, $query)) {
            s_msg('삭제되었습니다.');
            echo '<script>location.href="/notice"</script>';
        } else {
            msg('잘못된 접근입니다. 다시 시도해 주세요.');
        }
    } else {
        msg('잘못된 접근입니다. 다시 시도해 주세요.');
    }
