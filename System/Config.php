<?php
    
    ini_set('display_errors', 'On');
    
    session_start();
    
    $app    = '/Serma';
    
    $layouts    = array(
        
        'main'      => 'layout.html',
        'offline'   => 'layout_offline.html',
        'online'    => 'layout_online.html',
        '404'       => '404.html'
        
    );
    
    define("LAYOUTS", serialize( $layouts ) );
    define("HOME", getEnv("DOCUMENT_ROOT"). $app ."/");
    define("BASE", 'http://'.$_SERVER['SERVER_NAME']."/".basename(HOME));
    
    require HOME.'System/AutoLoad/AutoLoad.php';
    
    new AutoLoad($app );
