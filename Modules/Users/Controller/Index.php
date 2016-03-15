<?php
    
    namespace Users;

    use System\Template\Template;
    
    $tpl    = new Template();
    $tpl    ->setFile( __NAMESPACE__, 'Index' );
    $tpl    ->setData( "title", "Lista de Usuários");

    $js     = $tpl->makeResource(__NAMESPACE__, 'JS', 'User');
    $css    = $tpl->makeResource(__NAMESPACE__, 'CSS', 'Helper');
    $rsrc   = array( $js, $css );

    $tpl    ->setData('nameSpace', __NAMESPACE__);
    $tpl    ->publish('online', 'Serma FrameWork :: Usuários', $rsrc);
    
    
        
        
    