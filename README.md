# SermaFW
A simple PHP Framework

--------------------------------------------------------------------------------

This is a simple PHP framework, recommended to beginners in PHP and MVC structure.

#DEMO
  http://www.refreshweb.com.br/SermaFW/

---------------------------------------------------------------------------------

#Instalation

  First of all, please, make sure that the URL Rewrite is installed in your web server.

  Just download the zip file, and extract the files into a folder in your web server root folder. No dependencies needed, no plugins, nothing!
  
#Configuration

  #-System/Config.php

  Go to the folder System, and get the file Config.php. 
  The "$app" variable contains the folder of your application. 
  Ex: if you did put the SermaFW in a folder named "framework", so, your "$app" variable would be "$app = 'framework';".
  
  The "$layouts" array will tell the SermaFW how many and what are the layouts you will have in the application. Yes, in SermaFW you can have multiples layouts.
  
  We have four kinds of layout:
  
    - Main    -> The main layout;
    
    - Offline -> You can use this layout if you will have any kind of logon in your application. The offline layout can hide some menus, or other items that, only a logged user can see;
    
    - Online  -> You can use this layout to show to a logged user the menus, options and some other stuff;
    
    - 404     -> The layout called when we have a 404-page not found error.
    
    #-Config/ConfigDAO.php
    
    
