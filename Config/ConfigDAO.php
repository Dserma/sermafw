<?php

    namespace Config;
    
    Class ConfigDAO{
        
        public static function getParams(){
            
//            return array(
//
//                'driver'    => 'dblib',
//                'host'      => 'zipping.ddns.net:9090',
//                'user'      => 'sa',
//                'password'  => 'zipping@01',
//                'dbname'    => 'ZIPPING'
//
//                );
            
            return array(

                'driver'    => 'mysql',
                'host'      => 'localhost',
                'user'      => 'root',
                'password'  => 'root',
                'dbname'    => 'serma'

                );
            
        }
        
    }
    

    

    
