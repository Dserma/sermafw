<?php

    $uploaddir = '/var/www/Serma/Modules/'.$_POST['module'].'/Uploads/';
    $uploadfile = $uploaddir . basename($_FILES['files']['name']);

    if (move_uploaded_file($_FILES['files']['tmp_name'], $uploadfile)) {
        $resp   = "ok";
    } else {
        $resp   = "err";
    }
    
    echo json_encode($resp);

