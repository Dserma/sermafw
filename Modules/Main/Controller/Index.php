<?php
    
    namespace Main;

    use System\Template\Template;
    
    $tpl        = new Template();
    $tpl        ->setFile( __NAMESPACE__, 'Index' );
    $tpl        ->setData( "texto", "<center><h2>Esta é a página inicial do </h2><h1><span class='label label-success'>Serma Framework!</span></h1></center>");
    $tpl        ->setData( "botao", "Click me!");
    $js         = $tpl->makeResource(__NAMESPACE__, 'JS', 'Main');
    $js1        = $tpl->makeResource(__NAMESPACE__, 'JS', 'holder.min');
    $rsrc       = array( $js, $js1 );
    
    $tpl        ->setData( "nameSpace", __NAMESPACE__);
    $tpl        ->publish('offline', 'Serma FrameWork :: Home', $rsrc);