<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';

    $conn = dbconnect($host, $dbid, $dbpass, $dbname);

    $p_id = $_GET['p_id'];

    $query = "update pre set accept = '승인' , paid ='결제' where p_id = '$p_id'";
    $ret = mysqli_query($conn, $query);

    if ($ret) {
        msg('승인 되었습니다.');
    // echo '<script>location.href = "../admin_seminar_detail"</script>';
    } else {
        msg('잘못된 시도입니다. 잠시 후 다시 시도해주세요');
    }
