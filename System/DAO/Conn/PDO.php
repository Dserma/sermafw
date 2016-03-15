<?php

    namespace System\DAO\Conn;

    class PDO{
        
        private $driver;
        private $host;
        private $dbname;
        private $user;
        private $password;
        public  $conn;

        public function __construct($params = array()){
                
            $this->driver       = $params['driver']; 
            $this->host         = $params['host']; 
            $this->dbname       = $params['dbname']; 
            $this->user         = $params['user']; 
            $this->password     = $params['password']; 
            $this->connect();
            
        }
        
        private function connect(){
            
            try{
                
                $this->conn = new \PDO("$this->driver:host=$this->host;dbname=$this->dbname","$this->user","$this->password");
                
                if( $this->driver === 'dblib' ){
                
                    $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                    $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
                    
                }
                
                if( $this->driver === 'mysql' ){
                
                    $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                    $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
                    $this->conn->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
                    
                }
                
            }  catch (\PDOException $err){

                self::makeError($err);
                exit;

            }
            
        }
        
        public function __sleep() {
            
            return array(   
                'driver', 
                'host',
                'dbname',
                'user',
                'password'  
            );
            
	}
        
        public function __wakeup() {
            
            $this->connect();
            
	}
        
        public static function makeError($err){
            
            echo '<pre>';
            print_r($err);
        }
        
//            $trace = '<table border="0" bgcolor = "FFFFFF">';
//
//            if( $err->getCode() != '1045' && $err->getCode() != '1049' && $err->getCode() != '2005' && $err->getCode() != '0' ){
//
//
//                foreach ($err->getTrace() as $a => $b) {
//                    foreach ($b as $c => $d) {
//                        if ($c == 'args') {
//                            foreach ($d as $e => $f) {
//                                $trace .= '<tr><td><b>' . strval($a) . '#</b></td><td align="right"><u>args:</u></td> <td><u>' . $e . '</u>:</td><td><i>' . $f . '</i></td></tr>';
//                            }
//                        } else {
//                            $trace .= '<tr><td><b>' . strval($a) . '#</b></td><td align="right"><u>' . $c . '</u>:</td><td></td><td><i>' . $d . '</i></td>';
//                        }
//                    }
//                }
//
//            }
//
//            $trace .= '</table>';
//            echo '<br /><br /><br /><font face="Verdana"><center><fieldset style="width: 66%; border: 4px solid white; background: white;"><legend><b>[</b>PHP PDO Error ' 
//            . strval($err->getCode()) . '<b>]</b></legend> <table border="0" bgcolor = "FFFFFF"><tr><td align="right"><b><u>Message:</u></b></td><td><i>' . $err->getMessage() . 
//            '</i></td></tr><tr><td align="right"><b><u>Code:</u></b></td><td><i>' . strval($err->getCode()) . 
//            '</i></td></tr><tr><td align="right"><b><u>File:</u></b></td><td><i>' . $err->getFile() . 
//            '</i></td></tr><tr><td align="right"><b><u>Line:</u></b></td><td><i>' . strval($err->getLine()) . 
//            '</i></td></tr><tr><td align="right"><b><u>Trace:</u></b></td><td><br /><br />' . $trace . 
//            '</td></tr></table></fieldset></center></font>';
//
//        }
        
    }



?>
