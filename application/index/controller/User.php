<?php
namespace app\index\controller;

class User extends Common{

    public function index(){
        return $this->fetch();
    }
}
