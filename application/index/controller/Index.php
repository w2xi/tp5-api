<?php
namespace app\index\controller;

use think\facade\Config;
use app\common\controller\JsonResponse;
use app\index\model\User;

class Index extends \think\Controller
{
    public function index()
    {
        return '<h1 style="font-size:180px; margin-left:50px;">:) Hello world</h1>';
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
