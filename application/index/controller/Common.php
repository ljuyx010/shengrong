<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;

class Common extends Controller{
	
	public function _initialize(){
		// if(cookie('user')){
		// 	$rs=db('admin')->->where('account',cookie('user.a'))->where('password',cookie('user.p'))->find();
		// 	session('user',$rs);
		// }
		// if(!session('user.id')){			
		// 	$this->redirect('login/index');
		// }
    }
    
	
}

?>