<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/config/util.php';

    $conn = dbconnect($host, $dbid, $dbpass, $dbname);

    $data = $_POST['array'];
    $result = 200;
    for ($i = 0;$i < count($data);$i++) {
        $p_id = $data[$i];
        $query = "delete from pre where p_id = '$p_id'";
        if (!mysqli_query($conn, $query)) {
            $result = 201;
        }
    }
    echo json_encode(['result' => $result]);
