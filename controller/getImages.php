<?php
    $json = json_decode(file_get_contents('../database.json'));

    echo json_encode($json);
?>