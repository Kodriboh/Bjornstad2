<?php

  require_once dirname(__DIR__) . '/vendor/autoload.php';

  $dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
  $dotenv->load();
  
  require_once dirname(__DIR__) . '/App/bootstrap.php';

  /**
   * Routing
   */
  $router = new Core\Router();

  // Add the routes
  $router->add('', ['controller' => 'Pages', 'action' => 'index']);
  $router->add('{controller}/{action}');
  $router->add('{controller}/{id:\d+}/{action}');
  $router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
        
  $router->dispatch($_GET['url']);
