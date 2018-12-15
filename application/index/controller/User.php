<?php
namespace app\index\controller;

class User extends Common{

    public function index(){
      $z=input('zt',0,'intval');
    	$key=mb_convert_encoding(input('key'), "UTF-8", "GBK");;
    	switch ($z) {
    		case 1: $title="离职";
    			break;
    		default: $title="在职";
    			break;
    	}
    	$where['zt']=$z;
    	if($key){$where['name']=array('like','%'.$key.'%');}
    	$list=db('admin')->field('account,password',true)->where($where)->order('id asc')->paginate(15);
    	$this->assign('title',$title);
    	$this->assign('zt',$z);
    	$this->assign('list', $list);
        return $this->fetch();
    }

    public function add(){
    	return $this->fetch();
    }

    public function edit(){
    	$id=input('id');
    	$rs=db('admin')->field('password',true)->where('id',$id)->find();
    	$this->assign('v',$rs);
    	return $this->fetch('add');
    }

    public function runadd(){
    	$id=input('id');
    	$db=db('admin');
    	$data=input('');
    	if($id){    		
    		if(input('password')){$data['password']=MD5(MD5(input('password')));}else{unset($data['password']);}
    		$rs=$db->update($data);
    	}else{
    		$data['password']=MD5(MD5(input('password')));
    		$rs=$db->insert($data);
    	}
    	if($rs){$this->success('保存成功','user/index');}else{$this->error('保存失败');}
    }
}
