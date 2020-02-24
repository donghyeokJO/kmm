<?php
    // include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
    // include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/config/header.php';
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);

    $s_id = $_POST['s_id'];
    $pay = $_POST['pay_radio'];
    $name_kr = $_POST['name_kr'];
    $name_en = $_POST['name_en'];
    $regi_num = $_POST['regi_num'];
    $ph1 = $_POST['ph1'];
    $ph2 = $_POST['ph2'];
    $ph3 = $_POST['ph3'];
    $phone = $ph1 . '-' . $ph2 . '-' . $ph3;
    $license = $_POST['license'];
    $hos_name = $_POST['hos_name'];
    $subject = $_POST['pay_radio2'];
    $email = $_POST['email'];
    $money_name = $_POST['money_name'];
    $ondate = date('Y-m-d H:i:s', time());

    $query = "insert into pre(s_id,pay,name_kr,name_en,regi_num,phone,license,hos_name,subject,email,money_name,ondate,paid) values('$s_id','$pay','$name_kr','$name_en','$regi_num','$phone','$license','$hos_name','$subject','$email','$money_name','$ondate','미결제')";
    if ($ret = mysqli_query($conn, $query)) {
        s_msg('접수 신청이 완료되었습니다. 입금이 확인되면 신청이 완료됩니다.');
        echo '<script>location.href="/pre"</script>';
    } else {
        msg('잘못된 시도 입니다. 잠시후 다시 시도해 주세요');
    }
