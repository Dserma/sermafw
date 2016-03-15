<?php

    use Modules\Users\Model\User as User;
    
    $conn       = unserialize(CONN);
    $uList      = \Modules\Users\DAO\UserDAO::listUsers( $conn->conn );
    
    $table      = User::listUsers( $uList );
    echo $table;
    
