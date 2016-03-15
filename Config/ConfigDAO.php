<?php

    namespace Config;
    
    Class ConfigDAO{
        
        public static function getParams(){
            
            return array(

                'driver'    => 'mysql',
                'host'      => 'localhost',
                'user'      => 'root',
                'password'  => 'root',
                'dbname'    => 'serma'

                );
            
        }
        
    }
    

    

    
