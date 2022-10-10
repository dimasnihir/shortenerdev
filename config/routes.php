<?php




use shortener\Router;


Router::add('^admin$', ['controller'=> 'Main', 'action'=> 'index',
    'prefix' => 'admin']);

Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)/?$', ['controller'=> 'Main', 'action'=> 'index',
    'prefix' => 'admin']);

Router::add('^[Rr]edirect/(?P<action>[a-z-]+)/(?P<token>[a-zA-z0-9-]{5})$');
Router::add('^[Rr]edirect/(?P<token>[a-zA-z0-9-]{5})$');
Router::add('^(?P<token>[a-zA-z0-9-]{5})$', ['controller'=> 'Redirect', 'action'=> 'index']);



Router::add('^$', ['controller'=> 'Main', 'action'=> 'index']);
Router::add("^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$");