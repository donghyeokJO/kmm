<?php
    header('Content-Type:application/json');
    function get_keywords($key)
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
        $conn = dbconnect($host, $dbid, $dbpass, $dbname);
        $tmpArr = [];
        $query = "select * from $key";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $tmpArr['s1'] = $row['title'];
        $tmpArr['s2'] = $row['subtitle'];
        $tmpArr['s3'] = $row['content'];
        echo json_encode($tmpArr);
    }

    get_keywords($_POST['key']);
