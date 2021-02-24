<?php
/**
 * Created by PhpStorm.
 * User: pavlik
 * Date: 11.3.2019
 * Time: 13:08
 */

namespace Azet\MVC\Controller;

use Azet\MVC\Model\User as UserModel;

class User extends Base
{

    public function __construct()
    {
        $this->setLayout('user');
    }

    public function index()
    {
        $model = new UserModel();
        $this->setVariable('name', $model->getUser(1343));
        $this->setVariable('numbers', [1, 2, 4, 6, 34]);
    }


    public function admin()
    {
        $this->setVariable('name', 'admin');
    }


}