<?php




use core\Router;


Router::add('^admin$', ['controller'=> 'Main', 'action'=> 'index',
    'prefix' => 'admin']);

Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)/?$', ['controller'=> 'Main', 'action'=> 'index',
    'prefix' => 'admin']);


Router::add('^$', ['controller'=> 'Main', 'action'=> 'index']);
Router::add("^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$");