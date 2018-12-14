<?php
namespace app\index\controller;

class Customer extends Common{

    public function index(){
        return $this->fetch();
    }
}
