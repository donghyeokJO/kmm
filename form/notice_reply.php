<?php
    // include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
    // include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/config/header.php';
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);

    $writer = $_POST['writer'];
    $pw = $_POST['pw'];
    $content = $_POST['content'];
    $n_id = $_POST['n_id'];

    $ondate = date('Y-m-d H:i:s', time());
    $content = str_replace("'", "\'", $content);
    $query = "insert into reply(n_id,writer,content,ondate) values('$n_id','$writer','$content','$ondate')";
    if ($ret = mysqli_query($conn, $query)) {
        s_msg('성공적으로 입력되었습니다.');
        echo "<script>location.href='/notice_detail?id=$n_id'</script>";
    } else {
        msg('댓글 입력을 실패하였습니다. 다시 확인하여 주세요.');
    }
