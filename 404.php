<?php
    
    namespace System;

    use System\Template\Template;
    
    $tpl        = new Template();
    $tpl        ->setData( "texto", "Ooops! A página solicitada não existe =(");
    $tpl        ->setData( "home", BASE);
    $tpl        ->setData( "link", "voltar para a home");
    $tpl        ->publish404('Serma FrameWork :: Page not found =/');