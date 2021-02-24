<?php
/**
 * Created by PhpStorm.
 * User: pavlik
 * Date: 11.3.2019
 * Time: 14:41
 */

namespace Azet\MVC\Controller;


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Base
{

    /**
     * @var array
     */
    private $variables = [];
    /**
     * @var string
     */
    private $layout = '';

    /**
     * @param $layout
     */
    protected function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * @param $variable
     * @param $value
     */
    protected function setVariable($variable, $value)
    {
        $this->variables[$variable] = $value;
    }

    public function __destruct()
    {
        //extract($this->variables);
        //include(ROOT . "/src/View/" . $this->layout . ".php");

        $loader = new FilesystemLoader(ROOT . "/src/View/");
        $twig = new Environment($loader, [
            //'cache' => ROOT . "/src/View/cache"
        ]);
        echo $twig->render($this->layout . ".twig", $this->variables);
    }
}