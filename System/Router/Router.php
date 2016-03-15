<?php

    namespace System\Router;
    
    use System\Load\Load;

    class Router{
	
        private $_listUri = array();
	private $_listCall = array();
	private $_trim = '/\^$';
        private $isModule = array();
        
	public function add($uri, $function){
		
            $uri = trim($uri, $this->_trim);
            $this->_listUri[]   = $uri;
            $this->_listCall[]  = $function;
            
        }
        
        

        public function submit(){	
            
            $uri = isset($_REQUEST['uri']) ? $_REQUEST['uri'] : '/';
            $uri = trim($uri, $this->_trim);

            $replacementValues = array();
            
            foreach ($this->_listUri as $u ){
                
                $s  = explode('/', $u);
                $c  = explode('/', $uri);
                
                if( !in_array($s[0], $c) ){
                    
                    if( isset( $c[2] ) ){

                        if( !file_exists( $this->fileExists( HOME.'Modules/Main/'.$c[1].'/'.$c[2] ) ) ){

                            $this->isModule[] = 'N';

                        }else{

                           $this->isModule[] = 'M' ;

                        }

                    }
                    
                    if( isset( $c[1] ) ){
                        
                        if( !file_exists( $this->fileExists( HOME.'Modules/Main/'.$c[1] ) ) ){
                            

                            $this->isModule[] = 'N';

                        }else{
                           
                            $this->isModule[] = 'M' ;
                            
                        }
                        
                    }
                        

                }else{

                    $this->isModule[] = 'S'; 

                }
                    
                
            }
            
            if( in_array('S', $this->isModule ) ){
            
                foreach ($this->_listUri as $listKey => $listUri){

                    if (preg_match("#^$listUri$#", $uri)){


                        $realUri = explode('/', $uri);
                        $fakeUri = explode('/', $listUri);

                        if( count($fakeUri) === count($realUri) ){

                            foreach ($fakeUri as $key => $value){

                                if ($value == '.+'){

                                    $replacementValues[] = $realUri[$key];

                                }

                            }

                            call_user_func_array($this->_listCall[$listKey], $replacementValues);

                        }

                    }

                }
                
            }else{
                
                if( !in_array('M', $this->isModule ) ){
                
                    new Load($this->_listUri[0]);
                    
                }else{
                    
                    
//                    echo $c[1];
//                    exit;
                    new Load('Main', array( 'action' => $c[1] ) );
                    
                }
                
            }
		
	}
        
        protected function fileExists($fileName, $caseSensitive = true) {

            if(file_exists($fileName)) {
                return $fileName;
            }
            if($caseSensitive) return false;

            // Handle case insensitive requests            
            $directoryName = dirname($fileName);
            $fileArray = glob($directoryName . '/*', GLOB_NOSORT);
            $fileNameLowerCase = strtolower($fileName);
            foreach($fileArray as $file) {
                if(strtolower($file) == $fileNameLowerCase) {
                    return $file;
                }
            }
            return false;
        }

}
