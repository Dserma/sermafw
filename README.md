# SermaFW
A simple PHP Framework

--------------------------------------------------------------------------------

This is a simple PHP framework, recommended to beginners in PHP and MVC structure.

#DEMO
  http://www.refreshweb.com.br/SermaFW/
  
##CRUD
  http://www.refreshweb.com.br/CRUD/

---------------------------------------------------------------------------------

#Instalation

  First of all, please, make sure that the URL Rewrite is installed in your web server.

  Just download the zip file, and extract the files into a folder in your web server root folder. No dependencies needed, no plugins, nothing!
  
#Configuration

##System/Config.php

  Go to the folder System, and get the file Config.php. 
  The `$app` variable contains the folder of your application. 
  Ex: if you did put the SermaFW in a folder named "framework", so, your `$app"`variable would be "$app = 'framework';".
  
  The `$layouts` array will tell the SermaFW how many and what are the layouts you will have in the application. 
  Yes, in SermaFW you can have multiples layouts.

  We have four kinds of layout:
    
  - Main    -> The main layout;
  - Offline -> You can use this layout if you will have any kind of logon in your application. The offline layout can hide some menus, or other items that, only a logged user can see;
  - Online  -> You can use this layout to show to a logged user the menus, options and some other stuff;
  - 404     -> The layout called when we have a 404-page not found error.

##Config/ConfigDAO.php

  In the file `Config/ConfigDAO.php` we have to configure the `driver, host, user and password` for our database.
  
  In `driver` variable, we can use `mysql`, to MySql database, or `dblib`, for MS-SQL Server in Linux.

##Config/Routes.php
  
  Here we tell to SermaFW all te routes that we will use in the application. The routes will lead our users to the Modules in our application.
  
  The modules are in the "Modules" folder.
  
  Let's see an axample of a route:
  
  ```php  
  $router  = new Router();
            
  $router->add('/', function() {
     new Load('Main');
  });
  ```
      
  This will tell to SermaFW that, when the URI of our application is empty, or just a slash ( / ), the user will be redirected to the Main module.  
  
  The `.+` selector is a joker. We use this when we have an `action`, or an `action` and a `value`.
  For example, when we have the URI: `http://localhost/SermaFW/Users/Edit/40`, we have to redrect the user to our Module `Users`, to our controller `Edit.php`, passing the value `40` as an ID of the user.
  So, we have to make the route like this:
  ```php
  $router  = new Router();
            
  $router->add('/Users/.+/.+', function($action, $value) {
     new Load('Users', array( 'action' => $action, "value" => $value ));
  });
  ```
  
  
