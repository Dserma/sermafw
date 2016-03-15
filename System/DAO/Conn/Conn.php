<?php

    use System\DAO\Conn\PDO;
        
    $PARAMS_DAO     = Config\ConfigDAO::getParams();
    $CONN           = new PDO($PARAMS_DAO);
    
    define("CONN", serialize($CONN) );
    
        
            