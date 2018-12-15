<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;

class Login extends Controller{

    public function index(){
        return $this->fetch();
    }

    public function check(){
    	$code=input('code');
		$zh=input('account');
		$pass=input('password');
		$jz=input('remember');
    	if(!captcha_check($code)){
    		$this->error('验证码错误');
    	}else{
    		$rs=db('admin')
	    		->where('account',$zh)
	    		->where('password',MD5(MD5($pass)))->where('zt',0)
	    		->find();
	    	if($rs){
	    		session('user',$rs);
	    		if($jz){
	    			$user=array('a'=>$rs['account'],'p'=>$rs['password']);
	    		 	cookie('user', $user, 7*24*3600);
	    		}	    		
                $this->success('登录成功','index/index');
	    	}else{
	    		$this->error('账号或密码错误');
	    	}
    	}
    }
}
