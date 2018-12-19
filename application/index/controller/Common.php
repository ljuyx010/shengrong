<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;

class Common extends Controller{
	
	public function _initialize(){
		
		if(!session('user.id')){
			if(cookie('user')){
				$rs=db('admin')->where('zt',0)->where('account',cookie('user.a'))->where('password',cookie('user.p'))->find();
				session('user',$rs);
			}else{
				$this->redirect('login/index');
			}			
		}
    }
    
	
}

?>