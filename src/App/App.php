<?php
/**
 * Created by PhpStorm.
 * User: pavlik
 * Date: 11.3.2019
 * Time: 15:00
 */

namespace Azet\MVC\App;


class App
{

    public function run()
    {
        try {
            $this->route($_GET['uri']);
        } catch (NotFoundException $e) {
            header("HTTP/1.0 404 Not Found");
        }
    }

    /**
     * @param $url
     * @throws NotFoundException
     */
    private function route($url)
    {
        $router = new Router($url);
        $controller = $router->getController();
        $action = $router->getAction();

        $c = new $controller();
        $c->$action();
    }
}