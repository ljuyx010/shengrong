<?php
namespace app\index\controller;

class Index extends Common{

    public function index(){
        return $this->fetch();
    }

    public function upload(){
    	$file = request()->file('file');
	    // 移动到框架应用根目录/public/uploads/ 目录下
	    $path=ROOT_PATH . 'public' . DS . 'uploads';
	    $info = $file->validate(['size'=>4*1024*1024,'ext'=>'jpg,jpeg,png,gif'])->rule('uniqid')->move($path);
	    if($info){
	        // 成功上传后 获取上传信息
	        $src=$info->getSaveName();
	        $src=config('view_replace_str.__PUBLIC__').'/uploads/'.str_replace('\\','/',$src);
	        $rs=array('code'=>0,'msg'=>"成功上传",'data'=>array('src'=>$src));
	        return $rs;
	    }else{
	        // 上传失败获取错误信息
	        $msg=$file->getError();
	        $rs=array('code'=>2,'msg'=>$msg);
	        return $rs;
	    }
    }
}
