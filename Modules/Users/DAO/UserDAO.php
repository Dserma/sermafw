<?php

    namespace Modules\Users\DAO;
    
    use \Modules\Users\Model\User;
    use \DAO\Conn\PDO;
    
    class UserDAO{
        
        static function listUsers($conn){
            
            $sql    = " SELECT
                            *
                        FROM
                            users
                      ";
            
            try{
                
                $rs = $conn->prepare($sql);
                $rs->execute();
                $regs = $rs->fetchAll();
                $count  = count($regs);
                
                if( $count > 0 ){

                  foreach ($regs as $reg){
                      
                      $user     = new User();
                      $user     ->setIdUser( $reg->IdUser );
                      $user     ->setFnUser( $reg->FnUser );
                      $user     ->setLnUser( $reg->LnUser );
                      $list[]   = $user;
                      
                  }
                  
                }else{
                      
                      $list  = '';
                      
                  }
                  
                  return $list;
                
            } catch (\PDOException $err) {
                
                \DAO\Conn\PDO::geraErro($err);

            }
            
        }

    }

