<?php
    
    namespace Main;

    use System\Template\Template;
    
    $tpl        = new Template();
    $tpl        ->setFile( __NAMESPACE__, 'Index' );
    $js         = $tpl->makeResource(__NAMESPACE__, 'JS', 'Main');
    $js1        = $tpl->makeResource(__NAMESPACE__, 'JS', 'holder.min');
    $rsrc       = array( $js, $js1 );
    
    $tpl        ->setData( "nameSpace", __NAMESPACE__);
    $tpl        ->publish('offline', 'Serma FrameWork :: Home', $rsrc);