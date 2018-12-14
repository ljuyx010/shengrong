<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;

class Common extends Controller{
	
	public function _initialize(){
		// vendor('Auth.Authli');
		// $auth=new \Auth\Authli();
		// if(session('user.id')){			
		// 	$url=request()->controller().'/'.lcfirst(request()->action());
		// 	$result=$auth->check($url,session('user.id'));
		// 	if(!$result){
		// 		$this->error('您没有权限！');
		// 	}
		// }else{
		// 	$this->redirect('login/index');
		// }
		
		
    }
    
	
}

?>