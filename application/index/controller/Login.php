<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;

class Login extends Controller{

    public function index(){
        return $this->fetch();
    }
}
