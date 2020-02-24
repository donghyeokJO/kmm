<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';

    $conn = dbconnect($host, $dbid, $dbpass, $dbname);

    $title = $_POST['title'];
    $n_id = $_POST['n_id'];
    $content = $_POST['notice_content'];

    // echo $u_code;
    $wdate = date('Y-m-d H:i:s', time());
    $content = str_replace("'", "\'", $content);
    $query = "update notice set title = '$title', content = '$content',w_date = '$wdate' where n_id = '$n_id'";
    if ($ret = mysqli_query($conn, $query)) {
        s_msg('성공적으로 수정되었습니다.');
        echo "<script>location.href='/notice_detail?id=$n_id'</script>";
    } else {
        msg('입력에 실패하였습니다. 내용을 확인해주세요');
    }
