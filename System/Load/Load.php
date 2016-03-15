<?php

    namespace System\Load;
    
    
    class Load{
        
        public function __construct($module = null, $params = null) {
            
            if( count($params) === 0 ){
            
                if( !@include("Modules/$module/Controller/Index.php") ){
                    
                    include_once '404.php';
                    
                }
                
            }else{
                
                if( ucfirst($params['action']) !== 'Ajax' ){
                
                    if( isset( $params['value'] ) ){

                        unset($_SESSION["value$module"]);
                        $_SESSION["value$module"]  = $params['value'];

                    }else{
                        
                        unset($_SESSION["value$module"]);
                        $_SESSION["value$module"]   = '';
                        
                    }
                
                    if(!@include( "Modules/$module/Controller/".ucfirst($params['action']).".php" ) ){
                        
                        include_once 'Modules/Main/Controller/404.php';
                        
                    } 
                    
                }else{
                    
                    include_once HOME.'Modules/'.$_REQUEST['uri'];  
                    
                }
                    
            }
                
        }
        
    }
