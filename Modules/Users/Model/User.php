<?php

    namespace Modules\Users\Model;

    class User{
        
        private $idUser;
        private $fnUser;
        private $lnUser;
        
        public static function listUsers( $list ){
            
            $div    = '';
            
            foreach( $list as $u ){
                
                $div    .= '<tr>';
                    $div    .= '<td>';
                        $div    .= $u->getIdUser();
                    $div    .= '</td>';
                    $div    .= '<td>';
                        $div    .= $u->getFnUser();
                    $div    .= '</td>';
                    $div    .= '<td>';
                        $div    .= $u->getLnUser();
                    $div    .= '</td>';
                    $div    .= '<td>';
                        $div    .= '<a class = "btn btn-primary" type="button" href = "Users/edit/'.trim( $u->getFnUser().' '.$u->getLnUser() ).'" > Edit </a>';
                    $div    .= '</td>';
                $div    .= '</tr>';
                
            }
            
            return $div;
            
        }
        
        function getIdUser() {
            return $this->idUser;
        }

        function getFnUser() {
            return $this->fnUser;
        }

        function getLnUser() {
            return $this->lnUser;
        }

        function setIdUser($idUser) {
            $this->id = $idUser;
        }

        function setFnUser($fnUser) {
            $this->fnUser = $fnUser;
        }

        function setLnUser($lnUser) {
            $this->lnUser = $lnUser;
        }


        
        
    }