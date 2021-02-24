<?php
/**
 * Created by PhpStorm.
 * User: pavlik
 * Date: 11.3.2019
 * Time: 14:56
 */

namespace Azet\MVC\App;

class Router
{
    private $route;

    /**
     * Router constructor.
     * @param $url
     */
    public function __construct($url)
    {
        require_once(ROOT . "/config/routes.php");
        if (isset($routes[$url])) {
            $this->route = $routes[$url];
        }
    }

    /**
     * @return string
     * @throws NotFoundException
     */
    public function getController()
    {
        if ($this->route) {
            return '\\Azet\\MVC\\Controller\\' . $this->route['controller'];
        } else {
            throw new NotFoundException();
        }
    }

    /**
     * @return mixed
     * @throws NotFoundException
     */
    public function getAction()
    {
        if ($this->route) {
            return $this->route['action'];
        } else {
            throw new NotFoundException();
        }
    }

}