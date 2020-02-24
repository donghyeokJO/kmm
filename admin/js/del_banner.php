<?php
    header('Content-Type:application/json');
    function get_keywords($number)
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';
        $conn = dbconnect($host, $dbid, $dbpass, $dbname);

        $query = "delete from banner where number = $number";

        echo json_encode(mysqli_query($conn, $query));
    }

    get_keywords($_POST['number']);
