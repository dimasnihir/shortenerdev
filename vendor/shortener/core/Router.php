<?php


namespace shortener;

class Router {
    protected static $routes = [];
    protected static $route = [];

//    Метод добавляет новый маршрут
    public static function add($regexp, $route = []) {
        self::$routes[$regexp] = $route;
    }
//    Метод возвращает все маршруты
    public static function getRoutes() {
        return self::$routes;
    }
//    Метод возвращает текущий маршрут
    public static function getRoute() {
        return self::$route;
    }

//    Медот подключает контроллер, вид, исходя из маршрута
    public static function dispatch($url) {

        $url = self::removeQueryString($url);

        if(self::matchRoute($url)){
            var_dump(self::$route);

            $controller = 'app/controllers/' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
            var_dump($controller);

            if(class_exists($controller)) {
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';

                if (method_exists($controllerObject, $action)) {

                    $controllerObject ->$action();
//                  $controllerObject->getView();

                } else {
                    throw new \Exception("Метод $controller::$action не найден", 404);
                }
            } else {
                throw new \Exception("Контроллер $controller не найден", 404);
            }

        }else{

            throw new \Exception("Страница не найдена", 404);
        }
    }

//    Метод проверяет существует ли заданый маршрут
    public  static function matchRoute($url) {

        if (!isset($url)) {
            $url = '';
        }
        foreach (self::$routes as $pattern => $route) {

            if(preg_match("#{$pattern}#", $url, $matches)) {
                foreach ($matches as $k => $v) {
                    if(is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }
                if(!isset($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;

                return true;
            }
        }
        return false;

    }
//
    protected static function upperCamelCase($name) {
        $name = str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
        return $name;
    }
//
    protected static function lowerCamelCase($name)
    {
        $name = lcfirst(self::upperCamelCase($name));
        return $name;
    }

    protected static function removeQueryString($url) {

        if($url) {
            $params = explode('&', $url, 2);
            if(false === strpos($params[0], '=')) {
                return rtrim($params[0], '/');
            } else {
                return '';
            }
        }

    }
}
