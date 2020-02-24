<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/config/header.php';
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select * from banner where number =$number";
    $qwer = mysqli_query($conn, $query);
    $banner = mysqli_fetch_array($qwer);

    $base = $_SERVER['DOCUMENT_ROOT'] . '/img/';

    $img_src = $_POST['f_name'];
    $a = explode('.', $img_src);

    $name = 'banner' . '.' . $a[1];

    $files = [];

    if ($_FILES) {
        // print_r($_FILES);

        if ($_FILES['file2']['tmp_name'][0] != '') {
            $newname = $a[0] . $name;
            $uploadfile = $base . $newname;
            $files[0] = $newname;

            move_uploaded_file($_FILES['file2']['tmp_name'][0], $uploadfile);
        }
        $img_src = '/img/' . $files[0];

        $query = "insert into banner(img_src) values('$img_src')";
        if (mysqli_query($conn, $query)) {
            msg('저장되었습니다');
            echo '<script>location.reload()</script>';
        } else {
            msg('오류발생, 다시 시도해주세요');
        }
    } else {
        msg('파일이 선택되지 않았습니다.');
    }
