<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/config/header.php';
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);

    $base = $_SERVER['DOCUMENT_ROOT'] . '/img/';

    $s_name = $_POST['s_name'];
    $s_post = $_POST['s_post'];
    $s_banner = $_POST['s_banner'];
    $s_year = $_POST['s_year'];
    $s_month = $_POST['s_month'];
    if ($s_month < 10) {
        $s_month = '0' . $s_month;
    }
    $s_day = $_POST['s_day'];
    if ($s_day < 10) {
        $s_day = '0' . $s_day;
    }
    $s_date = $s_year . '-' . $s_month . '-' . $s_day;
    $p1_year = $_POST['p1_year'];
    $p1_month = $_POST['p1_month'];
    if ($p1_month < 10) {
        $p1_month = '0' . $p1_month;
    }
    $p1_day = $_POST['p1_day'];
    if ($p1_day < 10) {
        $p1_day = '0' . $p1_day;
    }
    $p1_date = $p1_year . '-' . $p1_month . '-' . $p1_day;
    $p2_year = $_POST['p2_year'];
    $p2_month = $_POST['p2_month'];
    if ($p2_month < 10) {
        $p2_month = '0' . $p2_month;
    }
    $p2_day = $_POST['p2_day'];
    if ($p2_day < 10) {
        $p2_day = '0' . $p2_day;
    }
    $p2_date = $p2_year . '-' . $p2_month . '-' . $p2_day;
    $period = $p1_date . ' ~ ' . $p2_date;

    $a = explode('.', $s_post);
    $b = explode('.', $s_banner);
    $names = ['post' . '.' . $a[1], 'banner' . '.' . $b[1]];

    $files = [];
    $origin = [$seminar['s_post'], $seminar['s_banner']];
    if ($_FILES) {
        foreach ($_FILES['File']['name'] as $f => $name) {
            if ($_FILES['File']['tmp_name'] != '') {
                $name = $names[$f];
                $newname = $s_name . $name;
                $uploadfile = $base . $newname;
                $files[$f] = $newname;
                unlink($base . $origin[$f]);
                move_uploaded_file($_FILES['File']['tmp_name'][$f], $uploadfile);
            }
        }

        $s_post = '/img/' . $files[0];
        $s_banner = '/img/' . $files[1];
    }
    $from_end = '오전 9시 ~ 오후 6시';
    $query = "insert into seminar(s_name,s_date,s_banner,from_end,s_post,period) values('$s_name','$s_date','$s_banner','$from_end','$s_post','$period')";
    if (mysqli_query($conn, $query)) {
        msg('입력되었습니다');
    } else {
        msg('오류발생, 다시 시도해주세요');
    }
