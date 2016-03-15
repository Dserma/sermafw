<?php

    namespace Users;

    use System\Template\Template;
    
    $tpl    = new Template();
    $tpl    ->setFile( __NAMESPACE__, 'Edit' );
    $tpl    ->setData( "user",$_SESSION["value".__NAMESPACE__]);
    
    $js     = $tpl->makeResource(__NAMESPACE__, 'JS', 'Edit');
    $rsrc   = array( $js );
    
    $tpl    ->publish('online', 'Serma FrameWork :: Edição de Usuário', $rsrc);

