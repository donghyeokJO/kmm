<?php
    header('Content-Type:application/json');
    function get_keywords($number)
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
        $conn = dbconnect($host, $dbid, $dbpass, $dbname);

        $query = "select * from banner where number ='$number'";

        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);

        $tmpArr['number'] = $number;
        $tmpArr['img_src'] = $row['img_src'];

        echo json_encode($tmpArr);
    }

    get_keywords($_POST['number']);
