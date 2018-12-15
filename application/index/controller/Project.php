<?php
namespace app\index\controller;

class Project extends Common{

    public function index(){
    	$z=input('zt',0,'intval');
    	$key=mb_convert_encoding(input('key'), "UTF-8", "GBK");;
    	switch ($z) {
    		case 1: $title="已完成项目";
    			break;
    		case 2: $title="异常项目";
    			break;
    		default: $title="进行中项目";
    			break;
    	}
    	$where['p.zt']=$z;
    	if(!session('user.type')){
    		$where['Participant']=array('like','%'.session('user.id').'%');
    	}
    	if($key){$where['title']=array('like','%'.$key.'%');}
    	$list=db('project')->alias('p')->join('admin a','p.dz=a.id')->field('p.*,a.name')->where($where)->order('addtime desc')->paginate(15);
    	$this->assign('title',$title);
    	$this->assign('zt',$z);
    	$this->assign('list', $list);
        return $this->fetch();
    }

    public function add(){
    	$user=db('admin')->where('zt',0)->select();
    	$this->assign('u',$user);
    	return $this->fetch();
    }

    public function runadd(){
    	$data=input('');
    	if(input('id')){
    		$data['htime']=input('htime')?strtotime(input('htime')):time();
    		$data['Participant']=implode(',',input('Participant'));
    		$rs=db('project')->update($data);
    	}else{
    		$data['htime']=input('htime')?strtotime(input('htime')):time();
	    	$data['addtime']=time();
	    	$data['uptime']=time();
	    	$data['Participant']=implode(',',input('Participant'));
	    	$rs=db('project')->insert($data);
    	}
    	if($rs){$this->success('保存成功','project/index');}else{$this->error('保存失败');}
    }

    public function edit(){
    	$id=input('id');
    	$user=db('admin')->where('zt',0)->select();
    	$p=db('project')->where('id',$id)->find();
    	$p['Participant']=explode(',',$p['Participant']);
    	$this->assign('u',$user);
    	$this->assign('p',$p);
    	return $this->fetch('add');
    }
}
