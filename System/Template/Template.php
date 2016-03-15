<?php

    namespace System\Template;

    class Template{

        private $file;
        private $data = array();


        function  __construct($module   = 'Main', $file = 'index.html') {
            $this->setFile($module, $file);
        }

        public function setData($field, $value){
            $this->data[$field] = $value;
        }

        public function getData(){
            return $this->data;
        }

        public function setFile($module, $file){
            $this->file = HOME."Modules/$module/View/$file.html";
        }

        public function getFile(){
            return $this->file;
        }

        protected function loadFile(){
            
            if(file_exists($this->getFile())){
                
                $file = $this->getFile();
                
            }else{
                
                echo 'Erro ao carregar o arquivo:' .$this->getFile();
                
            }

            return $file;
        }

        public function publish($layout = 'main', $title = null, $resources = null){
            
            try{

                $layout     = $this->getLayout($layout, $title);
                $file       = file_get_contents($this->loadFile());
                
                foreach ($this->getData() as $k => $v){
                    
                    $replace = '[$'. $k . ']';
                    $file = str_replace($replace, $v, $file);
                
                    
                }
                
                $replace    = '[$content]';
                $output     = str_replace($replace, $file, $layout);
                
                if ( $resources !== null ){
                    
                    $rsrc   = '';
                    
                    foreach( $resources as $r ){
                        
                        $rsrc   .= $r."\n\t\t";
                        
                    }
                    
                }else{
                    
                    $rsrc   = '';
                    
                }
                
                $replace    = '[$home]';
                $output     = str_replace($replace, BASE, $output);
                
                $replace    = '[$resources]';
                $output     = str_replace($replace, $rsrc, $output);
                
                echo $output;

            }catch (Exception $error){
                echo $error->getMessage();
            }

        }
        
        public function publish404($title = null, $resources = null){
            
            try{

                $layout     = $this->getLayout('main', $title);
                $file       = file_get_contents('Layout/404.html');
                
                foreach ($this->getData() as $k => $v){
                    
                    $replace = '[$'. $k . ']';
                    $file = str_replace($replace, $v, $file);
                
                    
                }
                
                $replace    = '[$content]';
                $output     = str_replace($replace, $file, $layout);
                
                if ( $resources !== null ){
                    
                    $rsrc   = '';
                    
                    foreach( $resources as $r ){
                        
                        $rsrc   .= $r."\n\t\t";
                        
                    }
                    
                }else{
                    
                    $rsrc   = '';
                    
                }
                
                $replace    = '[$resources]';
                $output     = str_replace($replace, $rsrc, $output);
                
                echo $output;

            }catch (Exception $error){
                echo $error->getMessage();
            }

        }
        
        protected function getLayout($layout, $title){
            
            try{

                $l      = unserialize( LAYOUTS );
                $file = file_get_contents( BASE."/Layout/".$l[$layout]);
                
                $replace = '[$home]';
                $file = str_replace($replace, BASE, $file);
                
                $replace = '[$title]';
                $file = str_replace($replace, $title, $file);
                
                
                return $file;

            }catch (Exception $error){
                echo $error->getMessage();
            }

        }
        
        public function makeResource($module, $type, $name){
            
            $r      = '';
            
           if( $type === 'JS' ){
               
               $r   .= '<script type="text/javascript" src="'.BASE.'/Modules/'.$module.'/Resources/Js/'.$name.'.js"></script>';
               
           } 
           
           if( $type === 'CSS' ){
               
               $r   .= '<link rel="stylesheet" href="'.BASE.'/Modules/'.$module.'/Resources/Css/'.$name.'.css" />';
               
           }
           
           return $r;
           
           
            
        }

    }

?>
